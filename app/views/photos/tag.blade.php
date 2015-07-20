@extends('base')

@section('title')
:: Photos By Tag
@stop

@section('body')
<h1>Here are some photos with tag {{{$tag}}}</h1>
<ul class="small-block-grid-3">

@foreach ($tags as $tag_object)
  <li><img class="th" src="{{ $tag_object->image->url }}"></li>
@endforeach

</ul>
@stop