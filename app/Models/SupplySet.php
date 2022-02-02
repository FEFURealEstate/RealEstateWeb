<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\SupplySet
 *
 * @property int $id
 * @property int $price
 * @property int|null $agent_id
 * @property int $client_id
 * @property int $real_estate_id
 * @property-read \App\Models\PersonSet_Agent $agent
 * @property-read \App\Models\PersonSet_Client $client
 * @property-read \App\Models\DealSet|null $deal
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\NotFinishDeals[] $notFinishDeals
 * @property-read int|null $not_finish_deals_count
 * @property-read \App\Models\RealEstateSet $realEstate
 * @method static \Illuminate\Database\Eloquent\Builder|SupplySet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplySet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplySet query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplySet whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplySet whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplySet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplySet wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplySet whereRealEstateId($value)
 */
class SupplySet extends BaseModel
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

    public function realEstate()
    {
        return $this->belongsTo(RealEstateSet::class, 'real_estate_id');
    }

    public function deal()
    {
        return $this->hasOne(DealSet::class, 'supply_id');
    }

    public function notFinishDeals()
    {
        return $this->hasMany(NotFinishDeals::class, 'supply_id');
    }
}
