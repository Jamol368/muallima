<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'password', 'phone', 'surname', 'middle_name', 'subject_id', 'teacher_category_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the user info associated with the user.
     *
     * @return HasOne
     */
    public function userInfo(): HasOne
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }

    /**
     * Get the user balance associated with the user.
     *
     * @return HasOne
     */
    public function userBalance(): HasOne
    {
        return $this->hasOne(UserBalance::class);
    }

    /**
     * Get the results for the user.
     *
     * @return HasMany
     */
    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin();
    }

    public function isAdmin(): bool
    {
        return $this->phone === '941137003' || $this->phone === '973642564';
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacherCategory(): BelongsTo
    {
        return $this->belongsTo(TeacherCategory::class);
    }

    public function formatPhone(): string
    {
        $phone = preg_replace('/\D/', '', $this->phone);

        if (strlen($phone) === 9) {
            return '+998 (' .
                substr($phone, 0, 2) . ') ' .
                substr($phone, 2, 3) . ' ' .
                substr($phone, 5, 2) . ' ' .
                substr($phone, 7, 2);
        }

        return $phone;
    }
}
