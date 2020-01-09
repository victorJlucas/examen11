@extends('admin.layouts.layout')

@section('content')
    <p>Usuario autenticado: {{ auth()->user()->name }}</p>
    <p>Correo electrónico: {{ auth()->user()->email }}</p>
@endsection
