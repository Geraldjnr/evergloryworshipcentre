<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // 👇 IMPORTANT kwambiri
    protected $fillable = ['name', 'email', 'message'];
}
