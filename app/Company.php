<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];


    public function getRouteKeyName() {
        return 'slug';
    }

    // One to Many
    public function jobs() {
        return $this->hasMany('App\Job');
    }
}
