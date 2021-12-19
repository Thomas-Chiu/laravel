<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
  use HasFactory;

  protected $fillable = [
    "student_id",
    "phone"
  ];

  /*
   * Get the student that owns the phone.
   */
  public function studentRelation()
  {
    // 外鍵綁定主鍵 primary key
    return $this->belongsTo(Student::class);
  }
}