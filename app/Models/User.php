<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property int $fk_id_rol
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $full_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFkIdRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereActive($value)
 * @property-read \App\Models\Parking $parking
 * @property-read \App\Models\Special $special
 */
class User extends Authenticatable
{
    protected $table = 'user';
    protected $fillable = [
        'name',
        'last_name',
        'email'
    ];
    protected $appends = [
        'full_name'
    ];

    public function isAdmin()
    {
        if (Rol::ADMIN == $this->fk_id_rol) {
            return true;
        }
        return false;
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->last_name;
    }


    public function special()
    {
        return $this->hasOne(Special::class,
            'fk_id_user');
    }
    public function parking()
    {
        return $this->hasOne(Parking::class,
            'fk_id_user');
    }
}
