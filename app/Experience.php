<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Experience extends Model {

    

    

    protected $table    = 'experience';
    
    protected $fillable = [
          'user_id',
          'project'
    ];
    

    public static function boot()
    {
        parent::boot();

        Experience::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}