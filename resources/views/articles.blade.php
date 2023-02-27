@extends('components/layout')

@section('title')
    Каталог
@endsection


@section('content')
<link rel="stylesheet" href="src/css/app.css">
<div class="container mt-5 align-items-center">
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-8">
                @foreach($articles as $article)
                    <div class="border-bottom border-dark">
                    <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4 ">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1"><a class="text-secondary" href="articles/{{$article->id}}" style="text-decoration:none">{{$article->title}}</a></h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Запощено {{$article->created_at->format('d.m.Y H:i')}}</div>
                                <!-- Post categories-->
                                @for ($i = 0; $i < count($article->tag); $i++)
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#">{{$article->tag[$i]->name}}</a>
                                @endfor
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded img-thumbnail" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..."></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                <p class="fs-5 mb-4 text-truncate">{{$article->text}}</p>
                            </section>
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="btn interaction">
                                    <button type="button" class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                                        </svg>

                                        <label>{{$article->likes}}</label>
                                    </button>
                                </div>

                                <div class="fs-4 mb-3">
                                    <label>{{$article->views}}</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                    </svg>

                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <p class="text-secondary">{{ $articles->links() }}</p>

@endsection
