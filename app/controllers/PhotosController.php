<?php

class PhotosController extends BaseController
{
    public function getIndex()
    {
        $images = Image::all();
        return View::make('photos.index', array('images' => $images, 'test' => 'koche'));
    }

    public function getTag($tag)
    {
        $tags = Tag::where('name', '=', $tag)->get();
        return View::make('photos.tag', array('tag' => $tag, 'tags' => $tags));
    }
}