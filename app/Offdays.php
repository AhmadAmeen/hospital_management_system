<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offdays extends Model
{
  public $fillable = array('center_id', 'doc_id', 'mon', 'tues',
   'wed', 'thu', 'fri', 'sat', 'sun');
}
