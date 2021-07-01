@extends('customer.layout')

@section('title', 'Products')

@section('main')
    <h2>Products</h2>

    <!-- Filter/search form -->
    <form id="filter" class="grid-x grid-margin-x" action="{{route('products')}}">
        <label class="cell small-12 medium-6 large-4"><span class="show-for-sr">Filter by category</span>
            <select @if($selected['category'])name="category"@endif>
                <option value="">All categories</option>
                @foreach($categories as $category)
                    @if(count($category->subcats) > 0) <!-- has subcategories -->
                        <optgroup label="{{$category->name}}">
                            <option value="{{$category->slug}}">All {{$category->name}}</option>
                            @foreach($category->subcats as $subcat)
                                <option value="{{$subcat->slug}}">{{$subcat->name}}</option>
                            @endforeach
                        </optgroup>
                    @else
                        <option value="{{$category->slug}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>
        </label>
        <div class="input-group cell small-12 medium-6 large-8">
            <input class="input-group-field" type="search" placeholder="Search for a product..." @if($selected['search'])name="q" value="{{$selected['search']}}"@endif>
            <div class="input-group-button">
                <button type="submit" class="button">Search</button>
            </div>
        </div>
    </form>
<script>
    const categorySelect = document.querySelector('#filter select');
    document.querySelector('#filter option[value="{{$selected['category']}}"]').setAttribute('selected', 'selected');
    categorySelect.addEventListener('change', function() {
        if (categorySelect.selectedOptions[0].value == "") {
            categorySelect.removeAttribute('name')
        } else {
            categorySelect.setAttribute('name', 'category')
        }
        document.querySelector('#filter').submit();
    });
    const searchInput = document.querySelector('#filter input');
    searchInput.addEventListener('keyup', function(e) {
        if (e.target.value.trim()) {
            searchInput.setAttribute("name", "q");
        } else {
            searchInput.removeAttribute("name")
        }
    })
</script>
    <!-- Gallery -->
    <div class="gallery grid-x grid-padding-x small-up-1 medium-up-3 large-up-4" data-equalizer data-equalize-by-row="true">
        @forelse($products as $product)
            <div class="cell">
                <div class="gallery-item callout" data-equalizer-watch>
                    @if($product->picture)
                        <img src="images/{{$product->picture}}" alt="Photo">
                    @endif
                    <div class="gallery-item-details">
                        <h4>{{$product->name}}</h4>
                        @if($product->description)
                            <p>{{$product->description}}</p>
                        @endif
                        <p>
                            ${{$product->price}}
                            @if($product->pricing_unit)
                                /&nbsp;{{$product->pricing_unit}}
                            @endif
                        </p>
                        <div>
                            @if($product->category->parentcat)
                                <a href="{{url()->current() . "?category=" . $product->category->parentcat->slug}}" class="primary label">{{$product->category->parentcat->name}}</a>
                            @endif
                            <a href="{{url()->current() . "?category=" . $product->category->slug}}" class="primary label">{{$product->category->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="cell small-12">Sorry, no products are currently available</p>
        @endforelse
    </div>


@endsection
