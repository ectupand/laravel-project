<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['theme', 'text', 'article_id'];
    public $timestamps = false;

    public function comment(): belongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
