<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\RealEstateFilterSet_LandFilter
 *
 * @property int $id
 * @property float $min_area
 * @property float $max_area
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_LandFilter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_LandFilter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_LandFilter query()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_LandFilter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_LandFilter whereMaxArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_LandFilter whereMinArea($value)
 */
class RealEstateFilterSet_LandFilter extends BaseModel
{
    use HasFactory;
}
