@extends('admin.layout')

@section('title', 'Categories')

@section('header', 'All categories')

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th><span class="show-for-sr">Actions</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <div class="stacked-for-small expanded button-group" style="margin: 0">
                                    <a href="{{route('categories.show', $category)}}" class="button">View</a>
                                    <a href="{{route('categories.edit', $category)}}" class="button success">Edit</a>
                                    <!-- TODO: Link to relevant page -->
                                    <a class="button alert">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No categories found. You can <a href="{{route('categories.create')}}">add a category</a>.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
