<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Catportfolio extends Model {

    

    

    protected $table    = 'catportfolio';
    
    protected $fillable = ['category'];
    

    public static function boot()
    {
        parent::boot();

        Catportfolio::observe(new UserActionsObserver);
    }
    
    
    
    
}