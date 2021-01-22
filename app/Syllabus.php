<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $table='course_syllabus';
    protected $fillable=['module', 'info', 'course_id'];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
