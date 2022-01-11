<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PersonSet_Admin
 *
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet_Admin whereId($value)
 */
class PersonSet_Admin extends BaseModel
{
    use HasFactory;

    public function person()
    {
        return $this->belongsTo(PersonSet::class, 'id');
    }
}
