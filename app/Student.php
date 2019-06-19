<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function group() {
        return $this->belongsTo('App\Group');
    }

    public function subjects() {
        return $this->belongsToMany('App\Subject')->withTimestamps();;
    }
}
