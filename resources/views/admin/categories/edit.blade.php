@extends('admin.layout')

@section('title', 'Categories')

@section('header', $create ? 'Create category' : 'Edit category')

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
                        $category=null;
                        $uploadNewFile = old('uploadFile');
                    @endphp
                @endif

                <form class="grid-x grid-padding-x" method="POST" action="{{$form['action']}}" enctype="multipart/form-data">
                    @method($form['method'])
                    @csrf

                    <label for="name" class="cell small-12 medium-2">Name</label>
                    <div class="cell small-12 medium-10">
                        <input id="name" name="name" type="text" value="{{old('name') ?? $category->name ?? ''}}">
                    </div>

                    <label for="description" class="cell small-12 medium-2">Description</label>
                    <div class="cell small-12 medium-10">
                        <input id="description" name="description" type="text" value="{{old('description') ?? $category->description ?? ''}}">
                    </div>

                    <label for="parent_category_id" class="cell small-12 medium-2">Parent category</label>
                    <div class="cell small-12 medium-10">
                        <select name="parent_category_id" style="margin-bottom: 16px;">
                            <option value=""></option>
                            @foreach($allCategories as $cat)
                                <option value="{{$cat->id}}">
                                    {{$cat->name}}
                                </option>
                            @endforeach
                        </select>
                        <script>
                            document.querySelector('select[name="parent_category_id"] option[value="{{old('parent_category_id') ?? $category->parentcat->id ?? ''}}"]').setAttribute('selected', 'selected');
                        </script>
                    </div>

                    <div class="cell small-12 medium-2">Image</div>
                    <div class="cell small-12 medium-10">
                        <div id="existingFile">
                            <input type="hidden" name="picture" value="{{$category->picture ?? ''}}"/>
                            @if(isset($category) && $category->picture)
                                <a href="{{url('images') . '/' . $category->picture}}">{{$category->picture}}</a>
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
