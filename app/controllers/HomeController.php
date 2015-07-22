<?php
class HomeController extends BaseController
{
    public function getIndex()
    {
        return Redirect::to('tags/cloud');
    }
}
?>
