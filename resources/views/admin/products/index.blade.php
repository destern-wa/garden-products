@extends('admin.layout')

@section('title', 'Products')

@section('header', 'All products')

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th><span class="show-for-sr">Actions</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>${{$product->price}}</td>
                            <td>
                                @if($product->category)
                                    <a href="{{route('categories.show', $product->category)}}">{{$product->category->name}}</a>
                                @endif
                            </td>
                            <td>
                                <div class="stacked-for-small expanded button-group" style="margin: 0">
                                    <a href="{{route('products.show', $product)}}" class="button">View</a>
                                    <a href="{{route('products.edit', $product)}}" class="button success">Edit</a>
                                    <a href="{{route('products.delete', $product)}}" class="button alert">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                No products found. You can <a href="{{route('products.create')}}">add a product</a>.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
