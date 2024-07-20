<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static insert(array $all)
 * @method static where(string $string, mixed $request)
 */
class email_free_subscription extends Model
{
    use HasFactory;
    protected $table = 'email_free_subscription';
    protected $fillable = [
        'email',
        'subscription_at'
    ];
}
