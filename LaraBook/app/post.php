<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // create relaion users and posts
    public function user(){
      return $this->belongsTo(user::class);
    }

  
}
