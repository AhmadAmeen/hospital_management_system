<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  public $fillable = array('dimg', 'dname', 'qualification',
   'phno', 'email', 'username', 'password', 'has_receptionist');
}
