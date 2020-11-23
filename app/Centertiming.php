<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Centertiming extends Model
{
    public $fillable = array(
      'center_id',
      'doc_id',
      'from',
      'to',
      'vt_type',
    );
}
