<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empolyed extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $date = ['created_at', 'updated_at'];
}