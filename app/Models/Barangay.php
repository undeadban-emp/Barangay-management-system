<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barangay extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'description',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'barangay_id', 'id');
    }
}