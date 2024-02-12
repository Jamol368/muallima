<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'test_id',
        'option',
        'is_true',
    ];

    /**
     * Get the test associated with the answer.
     */
    public function test(): HasOne
    {
        return $this->hasOne(Test::class);
    }
}
