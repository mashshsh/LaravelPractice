<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{

      protected $primaryKey = "id";
      public function tasks (){
        return $this->hasMany('App\Task');
      }
}
