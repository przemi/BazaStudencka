<?php

class EventsController extends BaseController {


    public function showIndex()
    {
        return View::make('events.index');
    }

    public function showIndexAdd()
    {
        return View::make('events.add-index');
    }

}
