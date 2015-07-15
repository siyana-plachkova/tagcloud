<?php

class PhotosController extends BaseController
{
    public function getIndex()
    {
        return View::make('photos.index');
    }

    public function getTag($tag)
    {
        return View::make('photos.tag', array('tag' => $tag));
    }
}