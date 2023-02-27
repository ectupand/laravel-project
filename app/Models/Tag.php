<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Tag extends Model
{
    public function article(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'articles-tags', 'tag_id', 'article_id');
    }
}
