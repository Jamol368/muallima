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
        'user_id',
        'name',
        'balance',
        'last_transaction_id',
    ];

    /**
     * Get the user that owns the user balance.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function check(int $price): bool
    {
        if ($this->balance >= $price) {
            $this->balance -= $price;
            return $this->update();
        }

        return false;
    }

    public function formatMoney(): string
    {
        return number_format($this->balance, 0, '.', ' ') . ' soʻm';
    }

}
