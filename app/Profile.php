<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Profile extends Model {

    

    

    protected $table    = 'profile';
    
    protected $fillable = [
          'user_id',
          'address',
          'phone',
          'website',
          'photo',
          'about'
    ];
    

    public static function boot()
    {
        parent::boot();

        Profile::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}