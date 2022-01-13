<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
 * @property-read \App\Models\PersonSet_Agent $agent
 * @property-read \App\Models\PersonSet_Client $client
 * @property-read \App\Models\DealSet|null $deal
 * @property-read \App\Models\RealEstateFilterSet $realEstateFilter
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
class DemandSet extends BaseModel
{
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(PersonSet_Agent::class, 'agent_id');
    }

    public function client()
    {
        return $this->belongsTo(PersonSet_Client::class, 'client_id');
    }

    public function realEstateFilter()
    {
        return $this->belongsTo(RealEstateFilterSet::class,
            'real_estate_filter_id');
    }

    public function deal()
    {
        return $this->hasOne(DealSet::class, 'demand_id');
    }
}
