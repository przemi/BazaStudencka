<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create(array(
            'nick' => 'test_user',
            'name' => 'Testowy użytkownik',
            'role' => '1',
            'password' => Hash::make('test')
        ));

        User::create(array(
            'nick' => 'test_user2',
            'name' => 'Testowy użytkownik 2',
            'role' => '1',
            'password' => Hash::make('test')
        ));
    }

}