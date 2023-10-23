<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'text',
        'supplement',
    ];

    public function quizzes() {
        return $this->belongsTo(Quizzes::class);
    }

    public function choices() {
        return $this->hasMany(Choices::class);
    }
}
