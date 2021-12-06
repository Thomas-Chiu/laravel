<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'name',
        'chinese',
        'english',
        'math',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function phoneRelation()
    {
        return $this->hasOne(Phone::class);
    }

    /**
     * Get the location associated with the user.
     */
    public function locationRelation()
    {
        return $this->hasOne(Location::class);
    }

    /**
     * Get the location associated with the user.
     */
    public function lovesRelation()
    {
        return $this->hasMany(Love::class);
    }
}
