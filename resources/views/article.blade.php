@extends('components/layout')

@section('title')
    {{$article->title}}
@endsection


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <!-- Comments section-->

                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4 col-12" id="addComment">
                                <input type="hidden" id="article_id" value="{{ $article->id }}">
                                <label>
                                    <input class="form-control" id="theme" placeholder="Тема">
                                </label>
                                <label>
                                    <textarea class="form-control" rows="3" cols="50" id="text" placeholder="Выскажитесь!"></textarea>
                                </label>

                                <button type="submit" class="btn btn-light btn-outline-secondary d-flex center">Отправить</button>
                            </form>

                            <script>
                                $('#addComment').on('submit', function (){
                                    var theme = $('#theme').val();
                                    var text = $('#text').val();
                                    var article_id = $('#article_id').val()

                                    $.ajax({
                                        type: 'POST',
                                        dataType: 'json',
                                        data: {
                                            subject: theme,
                                            body: text,
                                        },
                                        url: '/api/articles/'+article_id,
                                    })
                                });

                                $(function() {
                                    var article_id = $('#article_id').val()
                                    $.ajax({
                                        type: 'GET',
                                        url: '/api/articles/'+article_id+'/view',
                                        timeout: 5000,
                                    })
                                });
                            </script>

                            <!-- Single comment-->
                            @for ($i = 0; $i < count($article->comment); $i++)
                            <div class="d-flex">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{$article->comment[$i]->theme}}</div>
                                    {{$article->comment[$i]->text}}
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-8 ">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$article->title}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Запощено {{$article->created_at->format('d.m.Y H:i')}}</div>
                        <!-- Post categories-->
                        @for ($i = 0; $i < count($article->tag); $i++)
                        <a class="badge bg-secondary text-decoration-none link-light" href="#">{{$article->tag[$i]->name}}</a>
                        @endfor
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..."></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{$article->text}}</p>
                    </section>
                    <div class="d-flex justify-content-between align-items-center">

                        <div class="btn interaction" id="pressLike">
                            <button type="button" class="btn btn-secondary">
                                <svg id='likeBtn' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                                </svg>

                                <label id="likeCount">{{$article->likes}}</label>
                            </button>
                        </div>
                        <script>
                            $('#pressLike').on('click', function (){
                                var article_id = $('#article_id').val()
                                $.ajax({
                                    type: 'GET',
                                    url: '/api/articles/'+article_id+'/like',
                                    success: function(){
                                        setTimeout(
                                            function() {
                                                location.reload();}, 0o001);
                                    }
                                })
                            });
                        </script>

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
        </div>
    </div>
@endsection
