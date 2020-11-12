<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitHistory extends Model
{
  public $fillable = array(
    'patient_id',
    'date',
    'head_size',
    'length',
    'weight',
    'temperature',
    'other'
   );
}
