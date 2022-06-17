@extends('layouts.app')

@section("title") {{ $article->title }} @endsection
@section('head')
    <style>
        .description {
            white-space: pre-line;
        }
    </style>
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="#">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        {{ $article->title }}
                    </h4>
                    <div class="mt-2 text-primary">
                        <span class="small mr-2 font-weight-bold">
                            <i class="feather-layers"></i>
                            {{ $article->category->title }}
                        </span>
                        <span class="small mr-2 font-weight-bold">
                            <i class="feather-user"></i>
                            {{ $article->user->name }}
                        </span>
                        <span class="small mr-2 font-weight-bold">
                            <i class="feather-calendar"></i>
                            {{ $article->created_at->format("d-m-Y") }}
                        </span>

                        <span class="small mr-2 font-weight-bold">
                            <i class="feather-clock"></i>
                            {{ $article->created_at->format("h:i A") }}
                        </span>
                    </div>
                    <hr>
                    <p class="text-black-50 description">
                        {{ $article->description }}
                    </p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <a href="{{ route('article.edit',$article->id) }}" class="btn btn-outline-primary">Edit</a>
                            <a href="{{ route('article.index') }}" class="btn btn-outline-dark">All Articles</a>
                            <form action="{{ route('article.destroy',$article->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this article?')">Delete</button>
                            </form>
                        </div>
                        <p class="mb-0">{{ $article->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
