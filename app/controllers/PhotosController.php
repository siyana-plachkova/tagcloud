<?php

class PhotosController extends BaseController
{
    public function getIndex()
    {
        $images = Image::orderBy('created_at', 'desc')->get();
        return View::make('photos.index', array('images' => $images));
    }

    public function getTag($tag)
    {
        $tags = Tag::where('name', '=', $tag)->orderBy('confidence', 'desc')->get();
        return View::make('photos.tag', array('tag' => $tag, 'tags' => $tags));
    }

    public function postSearch()
    {
        $tag = Input::get('tag');
        return Redirect::route('photos/tag', array('tag' => $tag));
    }
}