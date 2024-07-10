<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upozila extends Model
{
    use HasFactory;
    public function zila(){
        return $this->belongsTo(District::class,'district_id','id');
    }
}
