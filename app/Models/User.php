<?php

namespace App\Models;

use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory;
    use HasRoles;
    use HasSuperAdmin;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'organization_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array[int, string]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = bcrypt($password);
    } */

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function AccessTokens(): HasMany
    {
        return $this->hasMany(AccessToken::class);
    }

    public function are_visible(): HasMany
    {
        return $this->hasMany(Visible::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // Super Admin mindig hozzáférhet
        if ($this->isSuperAdmin()) {
            return true;
        }

        // Ellenőrizzük, hogy van-e megfelelő szerepköre és megerősített email-je
        return $this->hasVerifiedEmail() && (
            $this->hasRole(['Admin', 'Operator'])
            // Itt adj meg egy megfelelő domain-t
        );
    }
}
