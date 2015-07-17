<?php

class Tag extends Eloquent
{
    protected $table = 'tags';

    public function image()
    {
        return $this->belongsTo('Image');
    }
}