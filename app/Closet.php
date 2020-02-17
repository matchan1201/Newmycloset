<?php

namespace mycloset;

use Illuminate\Database\Eloquent\Model;

class Closet extends Model
{
    protected $guarded = array('id');
    
    //以下を追記
    public static $rules = array(
        'item' => 'required',
        'category' => 'required',
        'season' => 'required'
        );
        
        public function histories()
        {
            return $this->hasMany('mycloset\History');
        }
}
