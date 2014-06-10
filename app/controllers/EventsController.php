<?php

class EventsController extends BaseController {


    public function showIndex()
    {
        return View::make('events.index');
    }

    public function showCreate()
    {
        return View::make('events.create');
    }

    public function store()
    {
        return View::make('events.index');
    }

    public function showEdit($id)
    {
        return View::make('events.edit');
    }

    public function showEvent($id)
    {
        return View::make('events.show');
    }

}
