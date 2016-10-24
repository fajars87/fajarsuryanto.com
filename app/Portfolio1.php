<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Portfolio1 extends Model {

    

    

    protected $table    = 'portfolio1';
    
    protected $fillable = [
          'catportfolio_id',
          'title',
          'desc',
          'pict',
          'detpict',
          'complete',
          'client',
          'isi',
          'url'
    ];
    

    public static function boot()
    {
        parent::boot();

        Portfolio1::observe(new UserActionsObserver);
    }
    
    public function catportfolio()
    {
        return $this->hasOne('App\Catportfolio', 'id', 'catportfolio_id');
    }


    
    
    
}