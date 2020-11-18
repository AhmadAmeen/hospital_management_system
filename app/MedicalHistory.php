<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
  public $fillable = array('patient_id', 'dname', 'disease_desc');
}
