@extends('admin.layouts.layout')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">POSTS <small> Listado</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-12">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#crearPost">
                <i class="fa fa-plus"></i> Crear Post
            </button>
        </div>
    </div>
@endsection

@section('content')
    <table id="posts-table" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Extracto</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->excerpt }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="/adminlte/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
        $(function () {
            $('#posts-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush
