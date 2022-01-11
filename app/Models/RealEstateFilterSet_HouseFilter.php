<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\RealEstateFilterSet_HouseFilter
 *
 * @property int|null $min_floors
 * @property int|null $max_floors
 * @property float|null $min_area
 * @property float|null $max_area
 * @property int|null $min_rooms
 * @property int|null $max_rooms
 * @property int $id
 * @property-read \App\Models\RealEstateFilterSet $realEstateFilter
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter query()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter whereMaxArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter whereMaxFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter whereMaxRooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter whereMinArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter whereMinFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet_HouseFilter whereMinRooms($value)
 */
class RealEstateFilterSet_HouseFilter extends BaseModel
{
    use HasFactory;

    public function realEstateFilter()
    {
        return $this->belongsTo(RealEstateFilterSet::class, 'id');
    }
}
