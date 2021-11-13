<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  use HasFactory;

  protected $fillable = [
    "student_id",
    "location_name"
  ];

  public function location()
  {
    // 外鍵綁定主鍵 primary key
    return $this->belongsTo(Student::class);
  }
}