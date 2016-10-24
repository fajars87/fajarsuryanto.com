<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Hobby extends Model {

    

    

    protected $table    = 'hobby';
    
    protected $fillable = [
          'user_id',
          'icon',
          'detail'
    ];
    

    public static function boot()
    {
        parent::boot();

        Hobby::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}