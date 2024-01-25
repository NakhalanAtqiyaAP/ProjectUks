<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'rombel_id',
        'rayon_id'
    ];

    public function rombels() {
        return $this->belongsTo(Rombels::class);
    }

    public function rayons() {
        return $this->belongsTo(Rayons::class);
    }

    
}
