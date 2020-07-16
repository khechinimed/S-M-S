<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $fillable = [
        'id', 'note1', 'note2', 'final_note', 'student_id'
    ];

    public function students(){
        return $this->hasMany('App\Student');
    }
}
