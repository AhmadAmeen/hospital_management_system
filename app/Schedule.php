<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  public $fillable = array(
    'pat_id',
    'center_id',
    'date',
    'time',
    'type',
    'status',
  );
}
