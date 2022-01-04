<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\RealEstateSet_Apartment
 *
 * @property int $id
 * @property float|null $total_area
 * @property int|null $rooms
 * @property int|null $floor
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Apartment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Apartment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Apartment query()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Apartment whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Apartment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Apartment whereRooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet_Apartment whereTotalArea($value)
 */
class RealEstateSet_Apartment extends BaseModel
{
    use HasFactory;
}
