@extends('admin.layout')

@section('title', 'Admin dashboard')

@section('header', 'Dashboard')

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-7 px-3 text-center grid-x grid-margin-x">
                <h3 class="text-2xl font-bold cell small-12">Welcome to the admin dashboard</h3>
                <p class="py-1.5 cell small-12">Here you can browse, view, edit, add, and delete the products and categories.</p>
                <div class="text-xl py-5 my-2 cell small-12 medium-6 border-2 border-dashed border-gray-300">
                    <h4 class="text-2xl">Products</h4>
                    <span class="my-1.5">Total: {{ count(\App\Models\Product::all()) }}</span>
                    <div class="button-group no-gaps mx-auto my-3" style="place-content: center">
                        <a class="primary button" href="{{route('products.index')}}">Browse</a>
                        <a class="success button" href="{{route('products.create')}}">Create</a>
                    </div>
                </div>
                <div class="text-xl py-5 my-2 cell small-12 medium-6 border-2 border-dashed border-gray-300">
                    <h4 class="text-2xl">Categories</h4>
                    <span class="my-1.5">Total: {{ count(\App\Models\Category::all()) }}</span>
                    <div class="button-group no-gaps mx-auto my-5" style="place-content: center">
                        <a class="primary button" href="{{route('categories.index')}}">Browse</a>
                        <a class="success button" href="{{route('categories.create')}}">Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
