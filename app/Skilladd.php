<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Skilladd extends Model {

    

    

    protected $table    = 'skilladd';
    
    protected $fillable = [
          'user_id',
          'skill',
          'skill_range'
    ];
    

    public static function boot()
    {
        parent::boot();

        Skilladd::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}