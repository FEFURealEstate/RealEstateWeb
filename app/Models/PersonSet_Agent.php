<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PersonSet_Agent
 *
 * @property int $id
 * @property int $deal_share
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DemandSet[] $demant
 * @property-read int|null $demant_count
 * @property-read \App\Models\PersonSet $person
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SupplySet[] $supply
 * @property-read int|null $supply_count
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent whereDealShare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Agent whereId($value)
 */
class PersonSet_Agent extends BaseModel
{
    use HasFactory;

    public function person()
    {
        return $this->belongsTo(PersonSet::class, 'id');
    }

    public function demant()
    {
        return $this->hasMany(DemandSet::class, 'agent_id');
    }

    public function supply()
    {
        return $this->hasMany(SupplySet::class, 'agent_id');
    }
}
