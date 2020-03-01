<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rol
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rol whereName($value)
 * @mixin \Eloquent
 */
class Rol extends Model
{
    protected $table = 'rol';

    const ADMIN = 1;
    const PARKING = 2;
    const CLIENT = 2;

}
