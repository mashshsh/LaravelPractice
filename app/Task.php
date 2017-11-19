<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'name',
        'done',
        'primary_level',
    ];

    public function priority()
    {
      return $this->hasOne('App\Priority', 'primary_level', 'primary_level');
    }

}
