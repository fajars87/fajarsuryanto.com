<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Work extends Model {

    

    

    protected $table    = 'work';
    
    protected $fillable = [
          'user_id',
          'company',
          'address',
          'period',
          'position',
          'note'
    ];
    

    public static function boot()
    {
        parent::boot();

        Work::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}