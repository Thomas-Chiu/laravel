<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  use HasFactory;

  // 操作資料庫白名單欄位
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
}