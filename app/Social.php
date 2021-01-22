<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table='instructor_social';
    protected $fillable=['icon', 'url_social', 'instructor_id'];
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
