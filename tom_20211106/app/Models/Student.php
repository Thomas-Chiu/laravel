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
}