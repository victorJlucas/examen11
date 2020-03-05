<div class="form-group">
    <label for="{{$name}}">{{$displayName}}</label>
    <select name="{{$name}}"
            class="form-control select2 {{ $errors->has($name) ? 'is-invalid' : '' }}" @if($multiple) multiple
            @endif data-placeholder="Select a State">
        @foreach($models as $model)

            @if($multiple)
                <option
                    value="{{ $model->id }}" {{ collect(old('tags', $post->tags->pluck('id')))->contains($model->id) ? 'selected': '' }}>{{ $model->name }}</option>
            @else
                <option
                    value="{{ $model->id }}" {{ old($name, $post->category_id) == $model->id ? 'selected' : ''}}>{{ $model->name }}</option>
            @endif

        @endforeach

    </select>
    {!! $errors->first($name,'<span class="form-text text-danger">:message</span>') !!}
</div>
