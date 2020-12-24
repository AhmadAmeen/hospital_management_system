<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescribedMedicine extends Model
{
  public $fillable = array('vh_id', 'med_id');
}
