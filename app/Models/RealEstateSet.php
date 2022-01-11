<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\RealEstateSet
 *
 * @property int $id
 * @property string|null $address_city
 * @property string|null $address_street
 * @property string|null $address_house
 * @property string|null $address_number
 * @property float|null $coordinate_latitude
 * @property float|null $coordinate_longitude
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet whereAddressCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet whereAddressHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet whereAddressNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet whereAddressStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet whereCoordinateLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet whereCoordinateLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstateSet whereId($value)
 */
class RealEstateSet extends BaseModel
{
    use HasFactory;

    public function supply()
    {
        return $this->hasMany(SupplySet::class, 'real_estate_id');
    }

    public function apartment()
    {
        return $this->hasOne(RealEstateSet_Apartment::class, 'id');
    }

    public function land()
    {
        return $this->hasOne(RealEstateSet_Land::class, 'id');
    }

    public function house()
    {
        return $this->hasOne(RealEstateSet_House::class, 'id');
    }
}
