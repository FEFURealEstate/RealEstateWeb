<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DemandSet
 *
 * @property int $id
 * @property string|null $address_city
 * @property string|null $address_street
 * @property string|null $address_house
 * @property string|null $address_number
 * @property int|null $min_price
 * @property int|null $max_price
 * @property int|null $agent_id
 * @property int $client_id
 * @property int $real_estate_filter_id
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereAddressCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereAddressHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereAddressNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereAddressStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereMaxPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DemandSet whereRealEstateFilterId($value)
 */
class DemandSet extends Model
{
    use HasFactory;
}
