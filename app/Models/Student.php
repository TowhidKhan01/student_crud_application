<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   public function getUniversity()
   {
      return $this->belongsTo(University::class,'university_id');
   }
}
