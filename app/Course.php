<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=['type', 'title', 'slug', 'schedule', 'fecha', 'date_start', 'duration', 'is_active', 'objectives', 'public', 'url_thumbnail', 'instructor_id'];
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    public function prices()
    {
        return $this->hasMany(Price::class);
    }
    // public function pictures()
    // {
    //     return $this->hasMany(Picture::class);
    // }
    public function syllabus()
    {
        return $this->hasMany(Syllabus::class);
    }
    public function benefits()
    {
        return $this->hasMany(Benefit::class);
    }
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
