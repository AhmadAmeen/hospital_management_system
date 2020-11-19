<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvVaccineTiming extends Model
{
  public $fillable = array(
    'v_id',
    'vtiming',
  );
}
