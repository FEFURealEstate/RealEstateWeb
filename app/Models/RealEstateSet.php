<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class RealEstateSet extends Model
{
    use HasFactory;
}
