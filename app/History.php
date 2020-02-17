<?php

namespace mycloset;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'closet_id' => 'required',
        'edited_at' => 'required',
    );
}
