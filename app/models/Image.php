<?php

class Image extends Eloquent
{
    protected $table = 'images';

     public function tags()
    {
        return $this->hasMany('Tag');
    }

}