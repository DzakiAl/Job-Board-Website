<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBoard extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'location', 'company', 'user_id'];
}
