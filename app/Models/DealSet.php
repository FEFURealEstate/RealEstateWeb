<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\DealSet
 *
 * @property int $id
 * @property int $demand_id
 * @property int $supply_id
 * @property-read \App\Models\DemandSet $demand
 * @property-read \App\Models\SupplySet $supply
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet whereDemandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DealSet whereSupplyId($value)
 */
class DealSet extends BaseModel
{
    use HasFactory;

    public function supply()
    {
        return $this->belongsTo(SupplySet::class, 'supply_id');
    }

    public function demand()
    {
        return $this->belongsTo(DemandSet::class, 'demand_id');
    }
}
