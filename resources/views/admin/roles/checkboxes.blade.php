@foreach($roles as $role)
    <div class="form-check">
        <label>
            <input type="checkbox" value="{{ $role->id }}" name="roles[]"
                {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
            {{ $role->name }}
            <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
        </label>
    </div>
@endforeach
