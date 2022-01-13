<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\NotFinishDeals
 *
 * @property int $id
 * @property int $demand_id
 * @property int $supply_id
 * @property-read \App\Models\DemandSet $demand
 * @property-read \App\Models\SupplySet $supply
 * @method static \Illuminate\Database\Eloquent\Builder|NotFinishDeals newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotFinishDeals newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotFinishDeals query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotFinishDeals whereDemandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotFinishDeals whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotFinishDeals whereSupplyId($value)
 */
class NotFinishDeals extends BaseModel
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
