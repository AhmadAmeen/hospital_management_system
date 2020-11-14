<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
  public $fillable = array(
    'cname',
    'address',
    'offdays',
    'timing',
    'doc_id',
    'has_receptionist'
  );
}
