<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Parking
 *
 * @property int $id
 * @property string $name
 * @property float $ranking
 * @property int $active
 * @property int $fk_id_user
 * @property int $fk_id_parking_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking whereFkIdParkingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking whereRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Parking whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Parking extends Model
{
    protected $table='parking';

}
