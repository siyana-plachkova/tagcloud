@extends('base')

@section('title')
::Tag Cloud
@stop

@section('body')
<h1>Here is our tag cloud</h1>
<ul>
@foreach ($tag_cloud as $tag=>$count)
  <li style="font-size: {{{$count*5}}}px">{{{$tag}}}</li>
@endforeach
</ul>
@stop
