<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // I campi assegnabili in massa
    protected $fillable = ['title', 'content', 'user_id'];

    // Relazione con il modello User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}