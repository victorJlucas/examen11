@extends('layouts.layout')

@section('meta-title', $post->title)

@section('meta-description', $post->excerpt)

@section('content')
    <article class="post container">
        @include($post->viewType())
        <div class="content-post">
            @include('posts.header')
            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $post->body !!}
            </div>

            <footer class="container-flex space-between">
                @include('posts.tags')
            </footer>
            <div class="comments">
                <div class="divider"></div>
                <div id="disqus_thread"></div>
            </div>
        </div>
    </article>

    <div class="post container">
        <form action="{{ route('posts.comments.store', $post->slug) }}" method="post" class="p-3">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="author">Autor:</label>
                <input type="text" name="author" value="{{ old('author') }}"
                       class="form-control" placeholder="Anónimo">
            </div>
            <div class="form-group">
                <label for="author">Título:</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="form-control" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="body">Texto:</label>
                <textarea type="text" name="body"
                          class="form-control">{{ old('body') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                Enviar comentario
            </button>

        </form>
    </div>
    <div class="post container">
        @forelse($comments as $comment)
            <div class="row">
                <form action="{{ route('posts.comments.destroy', $comment) }}" method="post" class="">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-xs btn-danger float-right " onclick="return confirm('¿Seguro que quieres eliminar este comentario?')">
                        <i class="fa fa-times"></i>
                    </button>
                </form>
                <a href="{{ route('posts.comments.edit', $comment) }}" class="btn btn-xs btn-info float-right"><i class="fa fa-pencil-alt "></i></a>--}}


            </div>
            <div class="p-4">
                <p>Autor: {{ $comment->author }}</p>
                <p>{{ $comment->body }}</p>
                <p>Creado el: {{ $comment->created_at }}</p>

            </div>
            <hr>
        @empty
            <div class="p-5">
                <h2>No hay comentarios</h2>
            </div>
        @endforelse
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $('#carousel').carousel()
    </script>
@endpush
