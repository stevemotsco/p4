<?php

class Service extends Eloquent { 

    public function event() {
        return $this->hasMany('Event');
    }
}