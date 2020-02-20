@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Editar Rol</h3>
                </div>
                <div class="card-body">

                    @include('admin.partials.messages')

                    <form action="{{ route('admin.roles.update', $role) }}" method="post">
                        @csrf @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" name="name" value="{{ old('name', $role->name) }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="guard">Guard:</label>
                                    <select name="guard_name" class="form-control">
                                        @foreach(config('auth.guards') as $guardName => $guardOptions)
                                            <option {{ old('guard_name', $role->guard_name) === $guardName ? 'selected' : '' }} value="{{ $guardName }}">{{ $guardName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Permisos</label>
                                @include('admin.permissions.checkboxes',['model' => $role])
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-block">
                                Actualizar rol
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
