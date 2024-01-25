<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayons extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rayon',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function students() {
        return $this->hasMany(Students::class, 'user_id', 'id');
    }
}
