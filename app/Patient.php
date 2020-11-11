<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  public $fillable = array(
  'fname',
  'lname',
  'gender',
  'age',
   'dob',
   'father_name',
   'guard_no',
   'pat_history',
   'doc_id'
 );
}
