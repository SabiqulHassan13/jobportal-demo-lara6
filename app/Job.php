<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // One to Many (inverse)
    public function company() {
        return $this->belongsTo('App\Company');
    }

    // public function ()

}
