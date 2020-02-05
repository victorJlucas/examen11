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
                <li class="breadcrumb-item active">Editar post</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Editar un post
            </h3>
        </div>
        <div class="card-body">
            @if($post->photos->count() > 0)
                <div class="row">
                @foreach($post->photos as $photo)
                    <div class="col-md-2">
                        <form action="{{ route('admin.photos.destroy', $photo) }}" method="post" class="form-inline">
                        @csrf
                        @method('delete')
                            <button class="btn btn-danger btn-xs" style="position: absolute">
                                <i class="fa fa-trash"></i>
                            </button>
                            <img src="{{ Storage::url($photo->url) }}" class="img-responsive img-thumbnail">
                    </form>
                    </div>
                @endforeach
            </div>
            @endif
            <form action="{{ route('admin.posts.update', $post) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Título del post</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                           placeholder="Escribe el título del post" value="{{ old('title', $post->title) }}">
                                    {!! $errors->first('title','<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Contenido del post
                                            </h3>
                                            <!-- tools box -->
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                                        title="Collapse">
                                                    <i class="fas fa-minus"></i></button>
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                        title="Remove">
                                                    <i class="fas fa-times"></i></button>
                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea name="body" class="form-control textarea" placeholder="Escribe el texto del post"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('body', $post->body) }}</textarea>
                                                {!! $errors->first('body','<span class="form-text text-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Audio o vídeo embebido del post</label>
                                            <textarea name="iframe" rows="4" class="form-control {{ $errors->has('iframe') ? 'is-invalid' : '' }}"
                                                placeholder="Añade el iframe del vídeo o audio"
                                            >{{ old('iframe', $post->iframe) }}</textarea>
                                            {!! $errors->first('iframe','<span class="form-text text-danger">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-outline card-primary">
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
                                               name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Categorías</label>
                                    <select name="category_id" class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                        <option value="">Selecciona una categoría</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('category_id','<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <label>Etiquetas</label>
                                    <select name="tags[]" class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" multiple="multiple"
                                            data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected': '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('tags','<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Extracto del post</label>
                                    <textarea name="excerpt" class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}"
                                              placeholder="Escribe un extracto del post">{{ old('excerpt', $post->excerpt) }}</textarea>
                                    {!! $errors->first('excerpt','<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <div class="dropzone"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Actualizar Post</button>
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
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(function () {
            $('#published_at').daterangepicker( {
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2020,
                maxYear: parseInt(moment().format('YYYY'),10)+1
            });
            $('#published_at').val('{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}');

            $('.select2').select2({
                tags: true
            });
            $('.textarea').summernote();

            var photos = new Dropzone('.dropzone', {
                url: '{{ route('admin.posts.photos.store', $post->slug) }}',
                acceptedFiles: 'image/*',
                paramName: 'photo',
                maxFilesize: 2,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dictDefaultMessage: 'Arrastra aquí las fotos'
            });

            photos.on('error', function (file,res) {
                var msg = res.errors.photo[0];
                $('.dz-error-message:last > span').text(msg);
            });


        });
    </script>
@endpush

