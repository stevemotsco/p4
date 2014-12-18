<?php

class Hevent extends Eloquent { 

    public function user() {
        return $this->belongsTo('User');
    }

    public function service() {
        return $this->belongsTo('Service');
    }

    public static function getRules(){
        # Define rules for events; will be used multiple times.
        $rules = array(
            'serv_type' => 'required',
            'event_date' => array('required', 'date', 'regex:/^(([0][0-9])|([1][0-2]))[\/](([0-2][0-9])|([3][0-1]))[\/]([2][0][0-2][0-9])$/'),
            'participants' => 'required|regex:/^(([0][0-9])|([1][0-2]))$/',
            'units' => 'required|regex:/^(([0][0-9])|([1][0-2]))$/'
        );
        return $rules;
    }

    public static function dbDate($date){

	    try {
            date_default_timezone_set('US/Central');
            
            # date entered is mm/dd/yyyy; need to make it yyyy-mm-dd
    		$fixed_date = substr($date, 6, 4).'-'.substr($date, 0, 2).'-'.substr($date, 3, 2);
    		$fixed_date = date_create($fixed_date);
            return $fixed_date;
            
        } catch(Exception $ex){
                throw $e;
        }
    }

    public static function showDate($date){
        if ($date !== '0000-00-00'){
            $show_date = substr($date, 5, 2).'/'.substr($date, 8, 2).'/'.substr($date, 0, 4);
            return $show_date;
        } else {
            $show_date = '';
            return $show_date;
        }
    }

}