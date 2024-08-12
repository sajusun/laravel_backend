<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static find(string $id)
 * @method static where(string $string, string $id)
 * @method static insert(array $array)
 */
class expensesApp_Out extends Model
{
    use HasFactory;

    protected $table = 'expenses_apps_out';
    protected $fillable = [
        'user_id',
        'date',
        'details',
        'amount',
        'remarks',
    ];
}
