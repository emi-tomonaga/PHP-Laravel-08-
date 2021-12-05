<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
   protected $guarded = array('id');

    public static $rules = array(
        'prifile_id' => 'required',
        'edited_at' => 'required',
    ); 
}
