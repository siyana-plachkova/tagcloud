@extends('base')

@section('title')
::Popular Photos
@stop

@section('body')
<h1>{{{ $test }}}</h1>
<ul class="small-block-grid-3">

@foreach ($images as $image)
  <li><img class="th" src="{{ $image->url }}"></li>
@endforeach
</ul>
@stop