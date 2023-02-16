<?php

namespace App\Models;

use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Household extends Model
{
    use HasFactory;
    protected $fillable = [
        'house_hold_no',
        'region',
        'province',
        'municipality',
        'barangay',
        'purok',
        'zone',
    ];
    public function person()
    {
        return $this->hasMany(Person::class, 'house_hold_no', 'id');
    }
}
