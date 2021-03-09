<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->belongsTo(Teachers::class,'teacher_id');
    }
}
