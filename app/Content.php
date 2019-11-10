<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    
    // The category that belong to the content.
   public function categories()
   {
       return $this->belongsTo('App\Category');
   }
}
