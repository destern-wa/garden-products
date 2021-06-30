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
                                    <!-- TODO: Link to relevant pages -->
                                    <a class="button">View</a>
                                    <a class="button success">Edit</a>
                                    <a class="button alert">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No categories found. You can <a>add a category</a>. <!-- TODO: Link to create category page -->
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
