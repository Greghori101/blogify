<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'title',
        'content',
        'status',
        'source',
        'external_id',
        'meta',
        'user_id'
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
