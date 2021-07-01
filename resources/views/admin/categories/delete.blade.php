@extends('admin.layout')

@section('title', 'Categories')

@section('header', 'Delete category')

@section('main')

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="grid-x grid-padding-x" method="post" action="{{route('categories.destroy', $category)}}">
                    @csrf
                    @method('DELETE')
                    <h3 class="cell small-12 text-center">
                        <div class="font-medium">Deleting category</div>
                        <a class="font-bold" href="{{route('categories.show', $category)}}">{{$category->name}}</a>
                    </h3>
                    <p class="cell small-12 text-center my-2">Are you sure you want to delete this category?</p>
                    <div class="cell small-5 medium-4">
                        <button class="button alert expanded" type="submit">Delete</button>
                    </div>
                    <div class="cell small-5 small-offset-1 medium-4 medium-offset-4">
                        <a class="button secondary expanded" href="{{url()->previous()}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
