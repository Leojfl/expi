<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Special
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Special newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Special newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Special query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $pension
 * @property int $active
 * @property int $fk_id_user
 * @property int $fk_id_parking
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Special whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Special whereFkIdParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Special whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Special whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Special wherePension($value)
 */
class Special extends Model
{
protected $table='special';
}
