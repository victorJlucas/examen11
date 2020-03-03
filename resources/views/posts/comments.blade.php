@extends('layouts.layout')


@section('content')
    <div class="container">
        <form action="{{ route('posts.comments.update', $comment) }}" method="post" class="p-3">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="author">Autor:</label>
                <input type="text" name="author" value="{{ old('author')??$comment->author }}"
                       class="form-control" placeholder="Por defecto: Anónimo">
            </div>
            <div class="form-group">
                <label for="body">Texto:</label>
                <textarea type="text" name="body"
                          class="form-control">{{ old('body')??$comment->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                Actualizar comentario
            </button>

        </form>
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
