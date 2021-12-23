<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\DealSet
 *
 * @property int $id
 * @property int $demand_id
 * @property int $supply_id
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet whereDemandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet whereSupplyId($value)
 */
class DealSet extends BaseModel
{
    use HasFactory;
}
