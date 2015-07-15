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
        return View::make('tags.cloud');
    }
}