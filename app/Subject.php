<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function students() {
        $this->belongsToMany('App\Student')->withTimestamps();
    }
}
