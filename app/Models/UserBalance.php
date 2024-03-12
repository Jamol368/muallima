<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBalance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'balace_id',
        'last_transaction_id',
    ];

    /**
     * Get the user that owns the user balance.
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function check(int $price): bool
    {
        if ($this->balance >= $price) {
            $this->balance -= $price;
            return $this->update();
        }

        return true;
    }
}
