<?php

class SessionsController extends BaseController {


    public function create()
    {
        return View::make('sessions.create');
    }

    public function store()
    {
        $input = Input::only('nick', 'password');

        if(Auth::attempt($input))
        {
            return Redirect::intended('/');
        }

        return Redirect::back()->withInput()->withFlashMessage('Nieprawidłowe dane logowania');

    }

    public function destroy($id = null)
    {
        Auth::logout();

        return Redirect::to('/');
    }

}