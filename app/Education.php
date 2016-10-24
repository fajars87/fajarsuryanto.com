<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Education extends Model {

    

    

    protected $table    = 'education';
    
    protected $fillable = [
          'user_id',
          'name',
          'address',
          'period',
          'level',
          'note'
    ];
    

    public static function boot()
    {
        parent::boot();

        Education::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}