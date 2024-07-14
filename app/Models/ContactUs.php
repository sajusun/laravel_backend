<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereAny(string[] $array, string $string, string $string1)
 * @method static find(string $id)
 * @method static create(array $array)
 */
class ContactUs extends Model
{
    use HasFactory;
    protected $table="contact_us_table";
    protected $fillable =[
        'name',
        'email',
        'subject',
        'message'
    ];
}
