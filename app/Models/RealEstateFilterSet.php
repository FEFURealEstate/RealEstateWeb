<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\RealEstateFilterSet
 *
 * @property int $id
 * @property-read \App\Models\RealEstateFilterSet_ApartmentFilter|null $apartmentFilter
 * @property-read \App\Models\DemandSet|null $demand
 * @property-read \App\Models\RealEstateFilterSet_HouseFilter|null $houseFilter
 * @property-read \App\Models\RealEstateFilterSet_LandFilter|null $landFilter
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateFilterSet whereId($value)
 */
class RealEstateFilterSet extends BaseModel
{
    use HasFactory;

    public function demand()
    {
        return $this->hasOne(DemandSet::class, 'real_estate_filter_id');
    }
    public function houseFilter()
    {
        return $this->hasOne(RealEstateFilterSet_HouseFilter::class, 'id');
    }

    public function apartmentFilter()
    {
        return $this->hasOne(RealEstateFilterSet_ApartmentFilter::class, 'id');
    }

    public function landFilter()
    {
        return $this->hasOne(RealEstateFilterSet_LandFilter::class, 'id');
    }
}
