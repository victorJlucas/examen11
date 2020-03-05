@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Datos personales</h3>
                </div>
                <div class="card-body">

                    @include('admin.partials.messages')

                    <form action="{{ route('admin.users.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Roles</label>
                               {{-- @include('admin.roles.checkboxes')--}}
                                {!! Form::bsCheckbox($roles,'roles', $user, 'roles') !!}
                                <label>Permisos</label>
                                {!! Form::bsCheckbox($permissions,'permissions', $user, 'permissions') !!}
                               {{-- @include('admin.permissions.checkboxes', ['model' => $user])--}}
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-block">
                                Crear usuario
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <span class="form-text">
                        La contraseña será generada automáticamente y enviada al nuevo usuario por email
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
