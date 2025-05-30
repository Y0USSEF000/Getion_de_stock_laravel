<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $table = 'supports'; // Explicitly map to supports table
    protected $fillable = ['name', 'email', 'subject', 'message'];
}