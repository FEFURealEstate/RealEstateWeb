<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\RealEstateSet_House
 *
 * @property int $id
 * @property float|null $total_area
 * @property int|null $total_floors
 * @property int|null $total_rooms
 * @property-read \App\Models\RealEstateSet $realEstate
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_House newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_House newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_House query()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_House whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_House whereTotalArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_House whereTotalFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_House whereTotalRooms($value)
 */
class RealEstateSet_House extends BaseModel
{
    use HasFactory;

    public function realEstate()
    {
        return $this->belongsTo(RealEstateSet::class, 'id');
    }
}
