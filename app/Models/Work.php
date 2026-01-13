<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model  // looks for plural version of the table in the db
{
    protected $fillable = ['name', 'skill', 'bio', 'dojo_id']; // maps data to exact columns
    /** @use HasFactory<\Database\Factories\WorkFactory> */
    use HasFactory;

    public function dojo() {
        return $this->belongsTo(Dojo::class);
    }
}
