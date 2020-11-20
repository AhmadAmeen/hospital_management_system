<?php

namespace App;
use app\VaccinationHistory;
use Illuminate\Database\Eloquent\Model;

class VaccinationHistory extends Model
{
  public $fillable = array(
    'pat_id',
    'v_id',
    'status'
   );
}
