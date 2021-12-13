<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RealEstateFilterSet_ApartmentFilter
 *
 * @property float|null $min_area
 * @property float|null $max_area
 * @property int|null $min_rooms
 * @property int|null $max_rooms
 * @property int|null $min_floor
 * @property int|null $max_floor
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter query()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter whereMaxArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter whereMaxFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter whereMaxRooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter whereMinArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter whereMinFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_ApartmentFilter whereMinRooms($value)
 */
class RealEstateFilterSet_ApartmentFilter extends Model
{
    use HasFactory;
}
