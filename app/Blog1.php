<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Blog1 extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'blog1';
    
    protected $fillable = [
          'bcat_id',
          'user_id',
          'title',
          'pict',
          'desc',
          'isi'
    ];
    

    public static function boot()
    {
        parent::boot();

        Blog1::observe(new UserActionsObserver);
    }
    
    public function bcat()
    {
        return $this->hasOne('App\Bcat', 'id', 'bcat_id');
    }


    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}