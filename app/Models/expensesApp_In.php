<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static find(string $id)
 * @method static where(string $string, string $id)
 */
class expensesApp_In extends Model
{
    use HasFactory;
    protected $table = 'expenses_apps_in';
    protected $fillable = [
        'user_id',
        'date',
        'details',
        'amount'
    ];
}
