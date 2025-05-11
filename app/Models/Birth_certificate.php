<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birth_certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'nid', 'father_name', 'mother_name', 'union', 'village', 'ward_no','birth_date', 'provide_date'
    ];
}
