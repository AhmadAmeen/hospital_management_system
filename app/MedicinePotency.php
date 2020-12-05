<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicinePotency extends Model
{
  public $fillable = array('med_id', 'age', 'weight', 'dosage');
}
