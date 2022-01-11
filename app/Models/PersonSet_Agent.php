<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PersonSet_Agent
 *
 * @property int $id
 * @property int $deal_share
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
