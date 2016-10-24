<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Skillpro extends Model {

    

    

    protected $table    = 'skillpro';
    
    protected $fillable = [
          'user_id',
          'skill',
          'skill_range'
    ];
    

    public static function boot()
    {
        parent::boot();

        Skillpro::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}