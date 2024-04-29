<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    // ketika user di hapus blog yg terkait denga user tersebut jg terhapus.
    protected static function boot() {
        parent::boot();
        static::deleting(fn ($user) => $user->blogs()->delete());
    }

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    public function projects() {
        return $this->hasMany(Projects::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
