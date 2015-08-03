@extends('base')

@section('title')
::Popular Photos
@stop

@section('body')
<h1>All images</h1>
<ul class="small-block-grid-3">

@foreach ($images as $image)
  <li><a href="{{ $image->post_url }}"><img class="th" src="/img/loader.gif" data-src="{{ $image->url }}"></a></li>
@endforeach
</ul>
@stop

@section('javascript')
<script type="text/javascript" src="{{ asset('js/jquery.unveil.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $("img").unveil(300);
    });
</script>
@stop