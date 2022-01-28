<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * App\Models\PersonSet
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string $login
 * @property string $password_hash
 * @property string|null $remember_token
 * @property-read \App\Models\PersonSet_Admin|null $admin
 * @property-read \App\Models\PersonSet_Agent|null $agent
 * @property-read \App\Models\PersonSet_Client|null $client
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet wherePasswordHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonSet whereRememberToken($value)
 */
class PersonSet extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    public function admin()
    {
        return $this->hasOne(PersonSet_Admin::class, 'id');
    }

    public function agent()
    {
        return $this->hasOne(PersonSet_Agent::class, 'id');
    }

    public function client()
    {
        return $this->hasOne(PersonSet_Client::class, 'id');
    }


    public function getAuthPassword() {
        return $this->password_hash;
    }
}
