<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $table='universities';
    // public function user(){
    //     return $this->belongsTo('Student');
    // }

   //  public function getStudents()
   // {
   //    return $this->hasMany(Student::class,'student_id');
   // }

   public function students()
   {
      return $this->hasMany(Student::class);
   }
    
}
