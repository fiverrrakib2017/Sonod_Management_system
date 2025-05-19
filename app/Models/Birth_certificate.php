<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birth_certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'father_name', 'mother_name',  'village', 'ward_no','birth_no','birth_date', 'provide_date','division_id','district_id','upozila_id','union_id'
    ];

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
    public function village(){
        return $this->belongsTo(Village::class,'village_id','id');
    }
    public function division(){
       return  $this->belongsTo(Division::class);
    }
}




