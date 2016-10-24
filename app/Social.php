<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Social extends Model {

    

    

    protected $table    = 'social';
    
    protected $fillable = [
          'user_id',
          'name',
          'url',
          'icon'
    ];
    

    public static function boot()
    {
        parent::boot();

        Social::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}