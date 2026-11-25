<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Writeup extends Model
{
    use HasFactory;
    public const CATEGORIES = ['Web', 'Crypto', 'Forensics', 'Pwn', 'Reverse Engineering', 'OSINT', 'Misc'];
    public const DIFFICULTIES = ['Easy', 'Medium', 'Hard'];

    protected $fillable = [
        'title',
        'category',
        'difficulty',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
