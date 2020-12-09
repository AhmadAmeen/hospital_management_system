<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalVisitHistory extends Model
{
  public $fillable = array(
    'patient_id',
    'date',
    'head_size',
    'length',
    'weight',
    'temperature',
    'v_type',
    'medicine',
    'dosage',
    'note',
   );
}
