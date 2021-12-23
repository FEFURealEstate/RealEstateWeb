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
}
