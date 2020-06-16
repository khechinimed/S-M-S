<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    //
    protected $fillable = [
        'user_id', 'className'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
