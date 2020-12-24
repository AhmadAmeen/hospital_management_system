<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvOffdays extends Model
{
    public $fillable = array(
      'center_id',
      'dayname',
      'status',
    );
}
