<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvCenter extends Model
{
  public $fillable = array(
    'cname',
    'address',
    'doc_id',
    'has_receptionist'
  );
}
