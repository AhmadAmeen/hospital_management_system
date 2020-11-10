<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
  public $fillable = array('vname', 'vtiming', 'doc_id', 'vdescription');
}
