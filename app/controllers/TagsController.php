<?php

class TagsController extends BaseController
{
    public function getIndex()
    {
        return Redirect::to('tags/cloud');
    }

    public function getLastHour()
    {
        return View::make('tags.last_hour');
    }

    public function getLastDay()
    {
        return View::make('tags.last_day');
    }

    public function getLastWeek()
    {
        return View::make('tags.last_week');
    }

    public function getCloud()
    {
        $tags = Tag::all();
        $tag_cloud = array();
        foreach($tags as $tag)
        {
            if(!in_array($tag->name, $tag_cloud))
            {
                $tag_cloud[$tag->name] = 0;
            }

            $tag_cloud[$tag->name] += 1;
        }

        return View::make('tags.cloud', array('tag_cloud' => $tag_cloud));
    }
}