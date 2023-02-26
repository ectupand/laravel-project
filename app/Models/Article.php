<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{

    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'articles-tags', 'article_id', 'tag_id');
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

}
