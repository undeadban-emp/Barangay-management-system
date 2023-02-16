<?php

namespace App\Models;

use App\Models\Household;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'house_hold_no',
        'isHead',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'birth_date',
        'birth_place',
        'sex',
        'civil_status',
        'citizenship',
    ];
    public function household()
    {
      return $this->belongsTo(Household::class, 'id', 'house_hold_no');
    }
}
