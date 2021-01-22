<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $table='course_benefits';
    protected $fillable=['benefit', 'course_id'];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
