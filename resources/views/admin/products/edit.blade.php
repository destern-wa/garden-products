@extends('admin.layout')

@section('title')
    @if($create)
        Products - create new
    @else
        Products - {{$product->name}} - edit
    @endif
@endsection

@section('header', $create ? 'Create product' : 'Edit product')

@section('main')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Show error mssages, if any --}}
                @if (count($errors) > 0)
                    <div class="callout alert mx-4 my-4">
                        <strong>Please fix these errors before continuing</strong>
                        <ul>
                            @foreach($errors->all() as $errorMessage)
                                <li>{{$errorMessage}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @php
                        // make sure old form values are retained
                        $product = null;
                    @endphp
                @endif

                <form class="grid-x grid-padding-x" method="POST" action="{{$form['action']}}" enctype="multipart/form-data">
                    @method($form['method'])
                    @csrf

                    <label for="name" class="cell small-12 medium-2">Name</label>
                    <div class="cell small-12 medium-10">
                        <input id="name" name="name" type="text" value="{{old('name') ?? $product->name ?? ''}}">
                    </div>

                    <label for="description" class="cell small-12 medium-2">Description</label>
                    <div class="cell small-12 medium-10">
                        <input id="description" name="description" type="text" value="{{old('description') ?? $product->description ?? ''}}">
                    </div>

                    <label for="price" class="cell small-12 medium-2" style="display: flex;justify-content:space-between">
                        <span>Price</span>
                        <span>$</span>
                    </label>
                    <div class="cell small-6 medium-5">
                        <input id="price" name="price" type="number" step="0.01" min="0.01" value="{{old('price') ?? $product->price ?? ''}}">
                    </div>
                    <label for="pricing_unit" class="cell small-1 text-center">
                        <span class="show-for-sr">Pricing</span>
                        per
                    </label>
                    <div class="cell small-5 medium-4" style="display: flex">
                        <input id="pricing_unit" name="pricing_unit" type="text" value="{{old('pricing_unit') ?? $product->pricing_unit ?? ''}}">
                    </div>

                    <label for="available" class="cell small-12 medium-2">Available</label>
                    <div class="cell small-12 medium-10">
                        <input id="available" name="available" class="switch-input" type="checkbox"
                               @if(count($errors) > 0) {{old('available') ? 'checked' : ''}}
                               @elseif($create) checked
                               @else {{$product->available ? 'checked' : ''}}
                               @endif
                        >
                        <label class="switch-paddle" for="available">
                            <span class="show-for-sr">Set availability</span>
                        </label>
                    </div>

                    <label for="category_id" class="cell small-12 medium-2">Category</label>
                    <div class="cell small-12 medium-10">
                        <select name="category_id" style="margin-bottom: 16px;">
                            <option value=""></option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">
                                    {{$cat->name}}
                                </option>
                            @endforeach
                        </select>
                        <script>
                            document.querySelector('select[name="category_id"] option[value="{{old('category_id') ?? $product->category->id ?? ''}}"]').setAttribute('selected', 'selected');
                        </script>
                    </div>

                    <div class="cell small-12 medium-2">Image</div>
                    <div class="cell small-12 medium-10">
                        <div id="existingFile">
                            <input type="hidden" name="picture" value="{{old('picture') ?? $product->picture ?? ''}}"/>
                            @if(isset($product) && $product->picture)
                                <a href="{{url('images') . '/' . $product->picture}}">{{$product->picture}}</a>
                            @endif
                        </div>
                        <a id="uploadNewFile" class="button small hollow primary">Upload new file</a>
                        <input type="file" id="uploadFile" class="hidden mx-5"/>
                        <a id="uploadFileReset" class="button small hollow alert hidden">Reset file</a>
                        <script>
                            const existingFileDiv = document.querySelector("#existingFile");
                            const uploadNewFileButton = document.querySelector("#uploadNewFile");
                            const uploadFileInput = document.querySelector("#uploadFile");
                            const uploadFileResetButton = document.querySelector("#uploadFileReset");

                            uploadNewFileButton.addEventListener("click", function (e) {
                                e.preventDefault();
                                existingFileDiv.classList.add("hidden");
                                uploadNewFileButton.classList.add("hidden");
                                uploadFileInput.setAttribute("name", "uploadFile")
                                uploadFileInput.classList.remove("hidden");
                                uploadFileResetButton.classList.remove("hidden");
                            });
                            uploadFileResetButton.addEventListener("click", function(e) {
                                e.preventDefault();
                                uploadFileInput.value = "";
                                existingFileDiv.classList.remove("hidden");
                                uploadNewFileButton.classList.remove("hidden");
                                uploadFileInput.removeAttribute("name");
                                uploadFileInput.classList.add("hidden");
                                uploadFileResetButton.classList.add("hidden");
                            });
                        </script>
                    </div>

                    <div class="cell small-6 medium-3 py-2">
                        <button class="button expanded" type="submit">Save</button>
                    </div>
                    <div class="cell small-6 medium-3 medium-offset-6 py-2">
                        <a class="button secondary expanded" href="{{url()->previous()}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
