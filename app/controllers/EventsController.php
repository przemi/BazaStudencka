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
        $event = Events::find($id);
        return View::make('events.edit', compact('event'));
    }

    public function showEvent($id)
    {
        $event = Events::find($id);

        return View::make('events.show', compact('event'));
    }

    public function delete($id)
    {
        $event = Events::find($id);

        $event->active = 0;
        $event->touch();
        $event->save();

        return 0;
    }

    public function save($id)
    {
        $event = Events::find($id);
        $event->name = Input::get('name');
        $event->date = Input::get('date');
        $event->info = Input::get('info');
        $event->localization_id = Input::get('localization_id');
        $event->save();

        return Redirect::route('$events.index');
    }

}
