@extends('admin.layout')

@section('title', 'Products - ' . $product->name)

@section('header', 'Product details')

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <dl class="grid-x grid-padding-x">
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">ID</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">{{$product->id}}</dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Name</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">{{$product->name}}</dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Description</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">{{$product->description}}</dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Slug</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">{{$product->slug}}</dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Price</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">
                        ${{$product->price}}
                        @if($product->pricing_unit)
                            /&nbsp;{{$product->pricing_unit}}
                        @endif
                    </dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Available</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">
                        @if($product->available) Yes
                        @else No
                        @endif
                    </dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Category</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">
                        @if($product->category)
                            <a href="{{route('categories.show', $product->category)}}">{{$product->category->name}}</a>
                        @else
                            <em>Not categorised</em>
                        @endif
                    </dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Picture</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">
                        @if($product->picture)
                            <img width="200px" src="{{url('images') . '/' . $product->picture}}" alt="Photo">
                        @endif
                    </dd>
                </dl>
                <div class="grid-x grid-padding-x py-2">
                    <div class="cell small-6 medium-3">
                        <a href="{{route('products.edit', $product)}}" class="button expanded">Edit</a>
                    </div>
                    <div class="cell small-6 medium-3">
                        <a href="{{route('products.delete', $product)}}" class="alert button expanded">Delete</a>
                    </div>
                    <div class="cell small-6 small-offset-3 medium-3 medium-offset-3">
                        <a href="{{route('products.index')}}" class="secondary button expanded">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
