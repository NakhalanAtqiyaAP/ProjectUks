<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Late extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'information',
        'date_time_sick',
    ];

    public function students() {
        return $this->belongsTo(Students::class);
    }
}
