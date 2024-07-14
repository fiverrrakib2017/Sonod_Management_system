<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_office extends Model
{
    use HasFactory;
    public function zila(){
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function upzila(){
        return $this->belongsTo(Upozila::class,'upozila_id','id');
    }
    public function union(){
        return $this->belongsTo(Union::class,'union_id','id');
    }
}
