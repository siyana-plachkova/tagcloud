<?php

class PhotosController extends BaseController
{
    public function getIndex()
    {
        $images = Image::orderBy('created_at')->get();
        return View::make('photos.index', array('images' => $images));
    }

    public function getTag($tag)
    {
        $tags = Tag::where('name', '=', $tag)->orderBy('id')->get();
        return View::make('photos.tag', array('tag' => $tag, 'tags' => $tags));
    }
}