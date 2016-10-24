<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Skilllang extends Model {

    

    

    protected $table    = 'skilllang';
    
    protected $fillable = [
          'user_id',
          'skill',
          'skill_range'
    ];
    
    public static $skill_range = ["1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5"];


    public static function boot()
    {
        parent::boot();

        Skilllang::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}