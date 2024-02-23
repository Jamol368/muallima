<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestType extends Model
{
    use HasFactory,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable  = [
        'name',
        'slug',
        'score',
        'price',
        'questions',
        'mins',
        'img',
        'description',
        'order',
    ];

    /**
     * Get the tests associated with the test_type
     *
     * @return HasMany
     */
    public function tests(): HasMany
    {
        return $this->hasMany('tests');
    }
}
