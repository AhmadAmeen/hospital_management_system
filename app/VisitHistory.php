<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitHistory extends Model
{
  public $fillable = array(
    'patient_id',
    'fname',
    'lname',
    'gender',
    'age',
    'dob',
    'father_name',
    'guard_no',
    'date',
    'head_size',
    'length',
    'weight',
    'temperature',
    'other'
   );
}
