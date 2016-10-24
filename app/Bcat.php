<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Bcat extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'bcat';
    
    protected $fillable = ['category'];
    

    public static function boot()
    {
        parent::boot();

        Bcat::observe(new UserActionsObserver);
    }
    
    
    
    
}