<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'guest_name',
        'guest_email',
        'content',
        'parent_id',
        'status',
    ];

    // Relasi ke Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi ke User (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Reply/balasan komentar
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Induk komentar
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Nama pengirim (user atau tamu)
    public function getAuthorNameAttribute(): string
    {
        return $this->user?->name ?? $this->guest_name ?? 'Anonim';
    }
}
