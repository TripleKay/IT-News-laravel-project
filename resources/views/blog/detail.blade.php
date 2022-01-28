@extends('blog.master')
@section('content')

        <div class="">
                <div class="py-3">

                     <div class="small post-category mb-3">
                            <a href="{{ route('baseOnCategory',$article->category->id) }}" rel="category tag">
                            {{ $article->category->title }}
                            </a>
                    </div>

                    <h2 class="fw-bolder">{{ $article->title }}</h2>
                    <div class="my-3 feature-image-box">
                        {{-- <img width="1024" height="682" src="assets/images/de0d23dd-86f6-3ee1-a871-6325fb45bd06-1024x682.jpg"> --}}
                        <div class="d-block d-md-flex justify-content-between align-items-center my-3">

                            <div class="">
                                @if ($article->user->photo)
                                            <img alt="" src="{{ asset('storage/profile/'.$article->user->photo) }}"
                                        class="avatar avatar-30 photo rounded-circle" height="30" width="30">
                                        @else
                                            <img alt="" src="{{ asset('dashboard/img/user-default-photo.png') }}"
                                        class="avatar avatar-30 photo rounded-circle" height="30" width="30">
                                @endif

                                     <a href="{{ route('baseOnUser',$article->user->id) }}" class="ms-2 text-decoration-none" title="Visit admin’s website"
                                    rel="author external">{{ $article->user->name }}</a>
                            </div>

                            <a href="{{ route('baseOnDate',$article->created_at->format("Y-m-d")) }}" class="text-decoration-none text-primary">
                                <i class="feather-calendar"></i>
                                {{ $article->created_at->format("d M Y  H:i a")}}
                            </a>
                        </div>

                        <p class="text-black-50" style="white-space: pre-line">
                            {{ $article->description }}
                        </p>

                        @php
                            $previousArticle = App\Article::where("id","<",$article->id)->latest('id')->first();
                            $nextArticle = App\Article::where("id",">",$article->id)->first();
                        @endphp

                        <div class="nav d-flex justify-content-between p-3">
                            <a href="{{ isset($previousArticle) ? route('detail',$previousArticle->id) : '#' }}"
                            class=" @empty($previousArticle) disabled @endempty btn btn-outline-primary page-mover rounded-circle">
                                <i class="feather-chevron-left"></i>
                            </a>

                            <a class="btn btn-outline-primary px-3 rounded-pill" href="{{ route('index') }}">
                                Read All
                            </a>

                            <a href="{{ isset($nextArticle) ? route('detail',$nextArticle->id) : '#' }}"
                            class="@empty($nextArticle) disabled @endempty btn btn-outline-primary page-mover rounded-circle">
                                <i class="feather-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

        </div>

@endsection
