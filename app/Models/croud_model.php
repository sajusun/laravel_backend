<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class croud_model extends Model
{
    use HasFactory;
    protected $table = "employe";
    protected $fillable =[
        'name',
        'position',
        'phone',
    ];
}
