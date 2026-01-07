<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model  // looks for plural version of the table in the db
{
    protected $fillable = ['name', 'skill', 'bio']; // maps data to exact columns
    /** @use HasFactory<\Database\Factories\WorkFactory> */
    use HasFactory;
}
