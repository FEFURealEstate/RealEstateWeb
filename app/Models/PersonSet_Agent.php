<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PersonSet_Agent
 *
 * @property int $id
 * @property int|null $deal_share
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent whereDealShare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent whereId($value)
 */
class PersonSet_Agent extends Model
{
    use HasFactory;
}
