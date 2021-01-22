<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable=['name', 'jobtitle', 'company', 'bio', 'url_profile'];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function social()
    {
        return $this->hasMany(Social::class);
    }
}
