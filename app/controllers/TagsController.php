<?php

use Carbon\Carbon;

class TagsController extends BaseController
{
    public function getIndex()
    {
        return Redirect::to('tags/cloud');
    }

    private function getTags($tags_array)
    {
        $tags_associative_array = array();
        foreach($tags_array as $tag)
        {
            if(!isset($tags_associative_array[$tag->name]))
            {
                $tags_associative_array[$tag->name] = 0;
            }

            $tags_associative_array[$tag->name] = $tags_associative_array[$tag->name] + 1;
        }

        return $tags_associative_array;
    }

    private function getLastTags($from, $threshold=10)
    {
        $last_images = Image::where('created_at', '>=', $from)->get();
        $last_tags = array();
        foreach($last_images as $image)
        {
            $image_tags = $image->tags;
            foreach ($image_tags as $tag)
            {
                if ($tag->confidence < $threshold) continue;
                array_push($last_tags, $tag);
            }
        }

        return $this->getTags($last_tags);

    }

    public function getLastHour()
    {
        $last_hour_tags = $this->getLastTags(Carbon::now()->subHour(), 0);
        return View::make('tags.cloud', array('tag_cloud' => $last_hour_tags, 'title' => 'Popular from last hour'));
    }

    public function getLastDay()
    {
        $last_24hours_tags = $this->getLastTags(Carbon::now()->subDay());

        return View::make('tags.cloud', array('tag_cloud' => $last_24hours_tags, 'title' => 'Popular from last day'));
    }

    public function getLastWeek()
    {
        $last_week_tags = $this->getLastTags(Carbon::now()->subWeek());

        return View::make('tags.cloud', array('tag_cloud' => $last_week_tags, 'title' => 'Popular from last week'));
    }

    public function getCloud()
    {
        $tags = Tag::where('confidence', '>=', 10)->get();

        $tag_cloud = $this->getTags($tags);

        return View::make('tags.cloud', array('tag_cloud' => $tag_cloud, 'title' => 'Tag cloud'));
    }
}