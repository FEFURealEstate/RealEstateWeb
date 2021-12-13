<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PersonSet_Client
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client wherePhone($value)
 */
class PersonSet_Client extends Model
{
    use HasFactory;
}
