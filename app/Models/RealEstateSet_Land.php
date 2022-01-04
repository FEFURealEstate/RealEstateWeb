<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\RealEstateSet_Land
 *
 * @property int $id
 * @property float|null $total_area
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Land newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Land newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Land query()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Land whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Land whereTotalArea($value)
 */
class RealEstateSet_Land extends BaseModel
{
    use HasFactory;
}
