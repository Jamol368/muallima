<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'color',
        'img',
        'order',
        'color_to',
    ];

    public function testTypes(): BelongsToMany
    {
        return $this->belongsToMany(TestType::class, 'subject_test_type');
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
