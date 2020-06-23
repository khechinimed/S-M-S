<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'age', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
