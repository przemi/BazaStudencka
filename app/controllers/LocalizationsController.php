<?php

class LocalizationsController extends BaseController {


    public function showIndex()
    {
        return View::make('localizations.index');
    }

    public function showCreate()
    {
        return View::make('localizations.create');
    }

    public function showEdit($id)
    {
        return View::make('localizations.edit');
    }

    public function showLocalization($id)
    {
        return View::make('localizations.show');
    }

}
