<div class="gallery-photos masonry">
    @foreach($post->photos->take(4) as $photo)
        <figure>
            <img src="{{ Storage::url($photo->url) }}" alt="" class="img-responsive">
            @if($loop->iteration === 4)
                <div class="overlay">{{ $post->photos->count() }} fotos</div>
            @endif
        </figure>
    @endforeach
</div>
