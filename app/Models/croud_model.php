<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class croud_model extends Model
{
    use HasFactory;
    protected $table = "employee";
    protected $fillable =[
        'name',
        'position',
        'phone',
    ];
}
