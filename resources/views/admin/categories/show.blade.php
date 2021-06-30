@extends('admin.layout')

@section('title', 'Categories')

@section('header', 'Category details')

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <dl class="grid-x grid-padding-x">
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">ID</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">{{$category->id}}</dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Name</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">{{$category->name}}</dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Description</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">{{$category->description}}</dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Slug</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">{{$category->slug}}</dd>
                    <dt class="cell small-12 medium-3 my-2 border-b font-bold">Picture</dt>
                    <dd class="cell small-12 medium-9 my-2 border-b-2">
                        @if($category->picture)
                            <img width="200px" src="{{url('images') . '/' . $category->picture}}" alt="Photo">
                        @endif
                    </dd>
                    @if($category->parentcat)
                        <dt class="cell small-12 medium-3 my-2 border-b font-bold">Parent category</dt>
                        <dd class="cell small-12 medium-9 my-2 border-b-2">
                            <a href="{{route('categories.show', $category->parentcat)}}">{{$category->parentcat->name}}</a>
                        </dd>
                    @endif
                </dl>
                <div class="grid-x grid-padding-x py-2">
                    <div class="cell small-6 medium-3">
                        <a class="button expanded">Edit</a> <!-- TODO: Link edit page -->
                    </div>
                    <div class="cell small-6 medium-3">
                        <a class="alert button expanded">Delete</a> <!-- TODO: Link delete page -->
                    </div>
                    <div class="cell small-6 small-offset-3 medium-3 medium-offset-3">
                        <a href="{{route('categories.index')}}" class="secondary button expanded">View all</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg my-2">
                <div class="grid-x grid-padding-x">
                    @if(count($category->subcats)>0)
                        <h3 class="cell small-12 font-bold py-2">Subcategories</h3>
                        <ul class="cell small-12 grid-x grid-padding-x small-up-2 medium-up-3">
                            @forelse($category->subcats as $subcat)
                                <li class="cell text-center py-1"><a
                                        href="{{route('categories.show', $subcat)}}">{{$subcat->name}}</a></li>
                            @empty
                                <li class="cell text-center py-1">None</li>
                            @endforelse
                        </ul>
                    @endif

                    <!-- TODO: List products in the category -->

                </div>
            </div>
        </div>
    </div>
@endsection
