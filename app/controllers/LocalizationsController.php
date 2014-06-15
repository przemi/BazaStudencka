<?php

class LocalizationsController extends BaseController {


    public function showIndex()
    {
        $localizations = Localization::where('active', '=', '1')->with('user')->get();

        return View::make('localizations.index', compact('localizations'));
    }

    public function showCreate()
    {
        return View::make('localizations.create');
    }

    public function store()
    {
        $localization = Localization::create(array(
                'name' => Input::get('name'),
                'city' => Input::get('city'),
                'street' => Input::get('street'),
                'lat'   => Input::get('lat'),
                'lng'   => Input::get('lng'),
                'user_id' => 1
            )
        );

        return Redirect::route('localizations.index');
    }

    public function showEdit($id)
    {
        return View::make('localizations.edit');
    }

    public function showLocalization($id)
    {
        $localization = Localization::find($id);

        return View::make('localizations.show', compact('localization'));
    }

    public function delete($id)
    {
        $localization = Localization::find($id);

        $localization->active = 0;
        $localization->touch();
        $localization->save();

        return 0;
    }
}
