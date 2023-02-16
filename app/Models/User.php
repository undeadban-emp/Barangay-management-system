<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Region;
use App\Models\Barangay;
use App\Models\Province;
use Illuminate\Support\Str;
use App\Models\Municipality;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'firstname',
        'middlename',
        'lastname',
        'phonenumber',
        'role',
        'region',
        'municipality',
        'barangay',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected function role(): Attribute{
        return new Attribute(
            get: fn($value) => ["user","admin","superadmin"][$value],
        );
    }
    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  Str::upper($this->lastname) . ', ' . Str::upper($this->firstname) . ' ' . Str::upper($this->middlename)
        );
    }
    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }
    public function municipality()
    {
        return $this->hasOne(Municipality::class, 'id', 'municipality_id');
    }
    public function barangays()
    {
        return $this->hasOne(Barangay::class, 'id', 'barangay_id');
    }
}