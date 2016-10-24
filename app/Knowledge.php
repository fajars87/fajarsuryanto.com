<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Knowledge extends Model {

    

    

    protected $table    = 'knowledge';
    
    protected $fillable = [
          'user_id',
          'knowledge'
    ];
    

    public static function boot()
    {
        parent::boot();

        Knowledge::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}