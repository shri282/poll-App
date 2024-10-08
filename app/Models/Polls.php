<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    use HasFactory;
    protected $casts = [
        'options' => 'array'
    ];
    protected $guarded = [];
    protected $fillable = ['question', 'description', 'options', 'status', 'category', 'totalVoters'];
}
