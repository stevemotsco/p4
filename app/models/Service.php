<?php

class Service extends Eloquent { 

    public function hevent() {
        return $this->hasMany('Hevent');
    }
}