<?php

class EventsController extends BaseController {


    public function showIndex()
    {
        $events = Events::where('active', '=', '1') -> with('localization', 'user') -> get();
        return View::make('events.index', compact('events'));
    }

    public function showCreate()
    {
        $localizations = Localization::where('active', '=', '1')->get();
        return View::make('events.create', compact('localizations'));
    }

    public function store()
    {
        //var_dump(Input::all());

        $event = Events::create(array(
                'name' => Input::get('name'),
                'date' => Input::get('date'),
                'info' => Input::get('info'),
                'localization_id' => Input::get('localization'),
                'user_id' => 1
            )
        );

        return Redirect::route('events.index');

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
