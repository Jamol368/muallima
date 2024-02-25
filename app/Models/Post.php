<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'post_category_id',
        'title',
        'slug',
        'description',
        'img',
        'content',
        'view_count',
    ];

    /**
     * Get the post category that owns the post.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class);
    }
}
