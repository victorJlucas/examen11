@extends('admin.layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Datos Personales</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('admin.users.update', $user) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña: </label>
                        <input type="password" name="password" class="form-control"
                        placeholder="Contraseña">
                        <span class="form-text">Dejar en blanco si no desea cambiarla</span>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Repite contraseña: </label>
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Repite la contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Actualizar usuario</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-default btn-block">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Roles</h3>
            </div>
            <div class="card-body">
                @role('Admin')
                    <form action="{{ route('admin.users.roles.update', $user) }}" method="post">
                        @csrf @method('put')
                        @include('admin.roles.checkboxes')
                        <button class="btn btn-primary btn-block">Actualizar Roles</button>
                    </form>
                @else
                    <ul class="list-group">
                        @forelse($user->roles as $role)
                            <li class="list-group-item">{{ $role->name }}</li>
                        @empty
                            <li class="list-group-item">No tienes roles asignados</li>
                        @endforelse
                    </ul>
                @endrole
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Permisos</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.permissions.update', $user) }}" method="post">
                    @csrf @method('put')
                    @include('admin.permissions.checkboxes', ['model' => $user])
                    <button class="btn btn-primary btn-block">Actualizar Permisos</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
