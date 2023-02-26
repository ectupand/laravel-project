@extends('components/layout')

@section('title')
    Мемовая
@endsection


@section('content')
    <div class="bg-dark bg-opacity-10 p-4 p-md-5 mb-4 rounded" >
        <h1>
            Смешно
        </h1>
        <p>
            Всем и не очень
        </p>
    </div>
    <div class="row mb-2 align-content-center">

        <div class="col-md-4">
            @foreach($articles::all() as $article)

                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        @if(count($article->tag)>=3)
                        @for ($i = 0; $i < 3; $i++)
                            <strong class="d-inline-block mb-2 text-secondary">{{$article->tag[$i]->name}}</strong>
                        @endfor
                        @endif
                        <h3 class="mb-0">{{$article->title}}</h3>
                        <div class="mb-1 text-muted">{{$article->created_at->format('d.m.Y H:i')}}</div>
                        <p class="card-text text-truncate" style="max-width: 165px;">{{$article->text}}</p>
                        <a href="/articles/{{$article->id}}" class="text-secondary">Читать далее</a>

                        <div class="col-md-6 themed-grid-col flex-row">
                            <button class="btn btn-outline-secondary" ></button>
                            <label>button</label>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

@endsection

