<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
    ];

     /**
     * Get the student that owns the phone.
     */
    public function studentRelation()
    {
        return $this->belongsTo(Student::class);
    }
}
