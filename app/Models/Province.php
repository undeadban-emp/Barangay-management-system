<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'description',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'province_id', 'id');
    }
}
