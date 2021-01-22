<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table='entry';
    protected $fillable=['fullname', 'phone', 'email', 'message', 'course_id'];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
