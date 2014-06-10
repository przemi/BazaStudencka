<?php

class Events extends Eloquent {

    protected $table = 'events';
    protected $guarded = array();

    public function user(){
        return $this->belongsTo('User', 'user_id');
    }

    public function localization(){
        return $this->belongsTo('Localization', 'localization_id');
    }

}

?>