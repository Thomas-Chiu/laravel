<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Love extends Model
{
  use HasFactory;

  // 因為 migration 自訂 loves ，所以 Model 要綁定 table
  protected $table = "loves";
  protected $fillable = [
    "student_id",
    "loves_name"
  ];

  public function love()
  {
    return $this->belongsTo(Student::class);
  }
}