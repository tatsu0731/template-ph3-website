<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class choices extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'is_correct',
    ];

    public function questions() {
        return $this->belongsTo(questions::class);
    }
}
