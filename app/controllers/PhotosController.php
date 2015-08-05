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
        $filtered_tags = array();
        $tags = Tag::where('name', '=', $tag)->orderBy('confidence', 'desc')->get();
        foreach ($tags as $tag_object) {
            if ($tag_object->image)
            {
                foreach ($tag_object->image->tags()->orderBy('confidence', 'desc')->take(5)->get() as $image_tag)
                {
                    if ($image_tag->name == $tag)
                    {
                        array_push($filtered_tags, $tag_object);
                    }
                }
            }
        }
        return View::make('photos.tag', array('tag' => $tag, 'tags' => $filtered_tags));
    }

    public function postSearch()
    {
        $tag = Input::get('tag');
        return Redirect::route('photos/tag', array('tag' => $tag));
    }
}