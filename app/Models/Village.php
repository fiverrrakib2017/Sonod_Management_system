<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
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
    public function post_office(){
        return $this->belongsTo(Post_office::class,'post_office_id','id');
    }
}
