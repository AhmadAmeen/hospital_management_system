<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
  public $fillable = array('vh_id', 'dis_id');
}
