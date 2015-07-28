@extends('base')

@section('title')
:: Photos By Tag
@stop

@section('body')
<h1>Here are some photos with tag {{{$tag}}}</h1>
<ul class="small-block-grid-3">

@foreach ($tags as $tag_object)
  <li><img class="th" src="/img/loader.gif" data-src="{{ $tag_object->image->url }}"></li>
@endforeach

</ul>
@stop


@section('javascript')
<script type="text/javascript" src="{{ asset('js/jquery.unveil.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $("img").unveil();
    });
</script>
@stop