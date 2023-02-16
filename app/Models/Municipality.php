<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipality extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'description',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'municipality_id', 'id');
    }
}