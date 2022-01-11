<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PersonSet_Client
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $phone
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DemandSet[] $demant
 * @property-read int|null $demant_count
 * @property-read \App\Models\PersonSet $person
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SupplySet[] $supply
 * @property-read int|null $supply_count
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Client wherePhone($value)
 */
class PersonSet_Client extends BaseModel
{
    use HasFactory;

    public function person()
    {
        return $this->belongsTo(PersonSet::class, 'id');
    }

    public function demant()
    {
        return $this->hasMany(DemandSet::class, 'client_id');
    }

    public function supply()
    {
        return $this->hasMany(SupplySet::class, 'client_id');
    }
}
