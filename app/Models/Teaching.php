<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'teaching_date',
        'published_date'
    ];
}
