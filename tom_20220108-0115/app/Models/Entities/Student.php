<?php

// 1. 原 Model 移到 Entities 底下
namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  use HasFactory;

  // 操作資料表白名單欄位
  protected $fillable = [
    'name',
    'chinese',
    'english',
    'math',
  ];

  /*
   * Get the phone associated with the user.
   */
  public function phoneRelation()
  {
    // 綁定外鍵 foreign key
    return $this->hasOne(Phone::class, "student_id");
  }

  public function location()
  {
    // 綁定外鍵 foreign key
    return $this->hasOne(Location::class, "student_id");
  }

  // 一對多
  public function love()
  {
    return $this->hasMany(Love::class, "student_id");
  }
}