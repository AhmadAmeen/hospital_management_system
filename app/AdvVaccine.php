<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvVaccine extends Model
{
  public $fillable = array(
    'vname',
    'doc_id',
    'vdescription'
  );
}
