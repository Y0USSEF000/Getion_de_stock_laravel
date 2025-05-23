<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    // Explicitly define the table name to match your migration
    protected $table = 'supports';
    
    // Fillable fields should match your database columns
    protected $fillable = [
        'name',       // From your migration
        'email',      // From your migration
        'subject',    // From your migration
        'message'     // From your migration
    ];
    
    // Optional: if you need to customize date formats
    protected $dates = ['created_at', 'updated_at'];
}