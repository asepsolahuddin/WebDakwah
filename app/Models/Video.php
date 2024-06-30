<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        'judul',
        'cover_path',
        'deskripsi',
        'video_url',
    ];
}
