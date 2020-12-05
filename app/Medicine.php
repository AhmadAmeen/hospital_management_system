<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
  public $fillable = array('name', 'desc', 'type');
}
