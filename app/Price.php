<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table='course_prices';
    protected $fillable=['info', 'amount', 'dscto' , 'promo', 'course_id'];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
