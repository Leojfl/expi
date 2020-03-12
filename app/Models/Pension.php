<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pension
 *
 * @property int $id
 * @property int $fk_id_user
 * @property int $fk_id_parking
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pension newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pension newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pension query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pension whereFkIdParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pension whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pension whereId($value)
 * @mixin \Eloquent
 */
class Pension extends Model
{
protected $table='pension';
}
