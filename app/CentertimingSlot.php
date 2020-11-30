<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentertimingSlot extends Model
{
  public $fillable = array(
    'ct_id',
    'from',
    'to',
    'status',
  );
}
