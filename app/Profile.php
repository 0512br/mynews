<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //課題14-5
    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        );
    
    // 201230 リレーションのため追記    
    public function histories()
    {
        return $this->hasMany('App\ProfileHistory');
    }
}

