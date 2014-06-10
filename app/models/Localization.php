<?php

class Localization extends Eloquent {

    protected $table = 'localizations';
    protected $guarded = array();

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }

    public function event(){
        return $this->hasMany('Events');
    }

}

?>