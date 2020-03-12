<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hours
 *
 * @property int $id
 * @property string $name
 * @property string $start
 * @property string $end
 * @property int $fk_id_parking
 * @property int $fk_id_day
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours whereFkIdDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours whereFkIdParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hours whereStart($value)
 * @mixin \Eloquent
 */
class Hours extends Model
{
    protected $table='hours';

}
