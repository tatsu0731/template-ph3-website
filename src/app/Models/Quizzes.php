<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Quizzes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // public function questions():HasManyThrough
    // {
    //     return $this->hasManyThrough(choices::class, questions::class);
    // }

    public function questions() {
        return $this->hasMany(Questions::class);
    }
}
