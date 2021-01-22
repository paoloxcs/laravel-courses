<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table='course_pictures';
    protected $fillable=['portrait', 'description', 'inversion' ,'course_id'];
    // public function course()
    // {
    //     return $this->belongsTo(Course::class, 'course_id');
    // }
}
