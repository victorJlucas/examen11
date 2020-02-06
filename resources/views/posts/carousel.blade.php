<div id="carousel" class="carousel slide" data-ride="carousel">
    {{--<ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>--}}
    <div class="carousel-inner">
        @foreach($post->photos as $photo)
        <div class="carousel-item {{ $loop->iteration === 1 ? 'active' : '' }}">
            <img src="{{ Storage::url($photo->url) }}" class="d-block w-100" alt="">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
