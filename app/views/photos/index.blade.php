@extends('base')

@section('title')
::Popular Photos
@stop

@section('body')
<h1>All images</h1>
<ul class="small-block-grid-3">

@foreach ($images as $image)
    <li class="image-block">
        <div class="image">
            <a href="{{ $image->post_url}}" class="image-post">
                <img class="th" src="{{ asset('img/loader.gif') }}" data-src="{{ $image->url }}">
            </a>
        </div>
        <div class="tags">
            @foreach ($image->tags()->orderBy('confidence', 'desc')->take(5)->get() as $image_tag)
                <a href="{{ url('photos/tag/') }}/{{ $image_tag->name }}" class="label-link">
                    <span class="label">
                        {{ $image_tag->name }}
                    </span>
                </a>
            @endforeach
        </div>
    </li>
@endforeach
</ul>
@stop

@section('javascript')
<script type="text/javascript" src="{{ asset('js/jquery.unveil.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $("img").unveil();
        $("li.image-block").hover(function(e) {
            var $image = $(this).find(".image");
            var $tag = $(this).find(".tags");
            $tag.css({"width": $image.width(), "height": $image.height()});
            $image.hide();
            $tag.show();
        }, function(e) {
            $(this).find(".image").show();
            $(this).find(".tags").hide();
        }).click(function(e) {
            if (!$(e.target).hasClass("tags"))
            {
                return;
            }
            window.open($(this).find(".image-post").attr('href'), '_blank');
        });
    });
</script>
@stop