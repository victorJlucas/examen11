@if($type === 'permissions')

    @foreach($MainModel as $id => $name)
        <div class="form-check">
            <label>
                <input type="checkbox" value="{{ $id }}" name="{{$ModelName}}[]"
                    {{ ($SecondaryModel->permissions->contains($id) || collect(old($ModelName))->contains($id)) ? 'checked' : '' }}>
                {{ $name }}
            </label>
        </div>
    @endforeach
@endif

@if($type === 'roles')
    @foreach($MainModel as $role)
        <div class="form-check">
            <label>
                <input type="checkbox" value="{{ $role->id }}" name="{{$ModelName}}[]"
                    {{ $SecondaryModel->roles->contains($role->id) ? 'checked' : '' }}>
                {{ $role->name }}
                <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
            </label>
        </div>
    @endforeach
@endif


{{--@foreach($models as $model)
    <div class="form-check">
        <label>
            <input type="checkbox" value="{{ $value }}" name="{{ $name }}"
            @if($variable)
                {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
            {{ $role->name }}
            <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
            @else
                {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                {{ $role->name }}
                <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
            @endif
        </label>
    </div>
@endforeach--}}

{{--@foreach($roles as $role)
    <div class="form-check">
        <label>
            <input type="checkbox" value="{{ $role->id }}" name="{{ $name }}"
                {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
            {{ $role->name }}
            <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
        </label>
    </div>
@endforeach--}}
