<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Status extends Model {

    

    

    protected $table    = 'status';
    
    protected $fillable = [
          'user_id',
          'icon',
          'detail'
    ];
    
    public static $icon = ["green-marker" => "green-marker", "red-marker" => "red-marker", "orange-marker" => "orange-marker"];


    public static function boot()
    {
        parent::boot();

        Status::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}