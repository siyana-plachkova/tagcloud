@extends('base')

@section('title')
::Tag Cloud
@stop

@section('body')
<h1>{{{$title}}}</h1>
<div class="columns large-12" id="tagcloud-container">
    <canvas id="tagcloud" width="1000" height="650"></canvas>
</div>
@stop

@section('javascript')
<script type="text/javascript" src="{{ asset('js/wordcloud2.js') }}"></script>
<script type="text/javascript">

    $(function() {
        var tagcloud = [];
        @foreach ($tag_cloud as $tag=>$count)
          tagcloud.push(['{{{ $tag }}}', {{ $count }}]);
        @endforeach

        var $box = $('<div id="box" hidden />');
        var $canvasContainer = $('#tagcloud-container');
        $canvasContainer.append($box);

        var $canvas = $('#tagcloud');

        // var width = $('#tagcloud-container').width();
        // var height = Math.floor(width * 0.65);
        // var pixelWidth = width;
        // var pixelHeight = height;

        // $canvas.css({
        //     'width': width + 'px',
        //     'height': height + 'px'
        // });


        WordCloud(
            $canvas[0],
            {
                list: tagcloud,
                gridSize: 4,
                weightFactor: 1,
                ellipticity: 1,
                fontFamily: 'Roboto',
                color: '#454d59',
                hover: function(item, dimension) {
                    if (!dimension) {
                        $box.prop('hidden', true);

                        return;
                    }

                    var dppx = window.devicePixelRatio;

                    $box.prop('hidden', false);
                    $box.css({
                        left: dimension.x / dppx + 10 + 'px',
                        top: dimension.y / dppx + 'px',
                        width: dimension.w / dppx + 10 + 'px',
                        height: dimension.h / dppx + 'px'
                    });
                },
                rotateRatio: 0.5,
                click: function(item) {
                    window.location = '{{ url('photos/tag/') }}' + item[0];
                },
                backgroundColor: '#f4f4f4',
                shape: function(theta) {
                  var max = 92;
                  var leng = [68,69,69,69,70,70,70,71,70,70,70,71,70,70,71,70,70,71,72,71,70,71,70,70,71,72,70,71,70,70,71,70,70,70,70,70,70,69,70,71,69,70,68,69,70,68,69,68,69,68,68,67,68,67,68,66,67,66,65,66,65,64,65,64,65,64,63,64,63,62,63,61,62,61,60,60,60,60,59,60,58,57,58,56,57,55,56,54,55,54,53,54,52,52,53,50,51,49,49,50,47,48,46,47,46,44,44,45,43,43,43,44,44,45,44,44,45,45,46,47,48,45,46,47,47,48,48,49,50,48,49,49,50,51,50,51,51,52,51,52,53,52,52,53,54,53,54,54,55,55,55,56,56,57,56,57,57,58,57,58,59,58,59,59,59,60,59,60,61,60,61,60,61,62,61,61,63,62,63,64,63,63,64,65,64,65,64,64,65,66,65,66,65,66,66,67,67,67,67,68,68,68,67,68,68,69,69,68,69,69,69,70,69,69,70,71,70,70,71,70,71,71,71,70,71,71,71,71,72,71,72,71,72,72,73,72,73,72,73,72,73,72,73,72,73,72,73,72,73,72,73,73,73,73,72,73,73,72,73,72,73,73,72,73,72,72,73,72,72,72,73,72,72,73,71,72,73,71,71,72,72,71,71,72,71,70,70,71,70,70,70,70,69,70,71,69,69,69,69,68,68,69,68,68,68,69,68,67,68,67,67,68,67,68,69,69,71,72,73,73,75,75,76,77,77,78,79,80,80,81,82,83,84,83,84,84,86,86,86,86,87,88,88,88,88,89,89,89,90,90,91,91,92,90,91,91,91,91,91,92,92,91,92,91,92,91,92,91,92,92,91,91,91,91,90,90,91,90,90,89,89,89,89,89,88,88,88,87,87,86,87,86,85,84,85,84,83,82,83,82,81,81,80,79,79,78,78,77,76,76,75,76,74,75,73,73,72,72,71,71,72,70,70,69,69,70,68,68,68,67,68,67,68,66,66,66,67,65,65,65,66,64,64,65,64,64,65,63,63,64,63,63,64,63,62,63,62,62,63,62,63,62,62,63,62,62,63,62,63,62,62,63,62,62,63,62,63,62,62,63,62,62,63,62,62,63,62,63,62,62,64,63,63,64,63,63,64,64,64,65,64,64,66,65,65,66,65,66,66,67,66,67,68,67,68,68,69,69,69,69,70,71,70,71,71,72,72,73,74,74,74,74,75,76,76,77,77,78,79,79,80,80,81,82,83,83,83,84,84,84,85,85,86,86,87,87,88,88,88,89,88,89,89,89,90,90,91,90,91,91,91,91,92,91,92,91,92,91,91,91,92,92,91,92,91,91,92,91,92,90,91,91,90,90,90,89,89,89,89,88,88,89,88,86,86,87,86,84,85,84,83,83,82,81,80,80,79,78,79,77,77,76,75,73,74,72,71,70,71];

                  return leng[(theta / (2 * Math.PI)) * leng.length | 0] / max;
                }
            }
        );
    });
</script>
@stop