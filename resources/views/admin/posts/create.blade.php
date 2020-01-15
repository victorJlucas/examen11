@extends('admin.layouts.layout')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">POSTS <small> Crear un post</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Crear post</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Crear un post nuevo
            </h3>
        </div>
        <div class="card-body">
            <form action="">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Título del post</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Escribe el título del post">
                                </div>
                                <div class="form-group">
                                    <label for="body">Contenido del post</label>
                                    <textarea name="body" rows="10" class="form-control"
                                              placeholder="Escribe el texto del post"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Fecha de publicación</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="published_at"
                                               name="published_at">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Categorías</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Selecciona una categoría</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Extracto del post</label>
                                    <textarea name="excerpt" class="form-control"
                                              placeholder="Escribe un extracto del post"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Guardar Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <script>
        $(function () {
            $('#published_at').daterangepicker( {
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2020,
                maxYear: parseInt(moment().format('YYYY'),10)+1
            });
        });
    </script>
@endpush
