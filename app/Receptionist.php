<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
  public $fillable = array('username', 'password', 'doc_id');
}
