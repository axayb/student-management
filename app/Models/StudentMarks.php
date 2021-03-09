<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Students::class,'student_id');
    }
    
}
