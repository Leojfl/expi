<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SpecialHours
 *
 * @property int $id
 * @property string $description
 * @property string $date
 * @property string $start
 * @property string $end
 * @property int $active
 * @property int $fk_id_parking
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereFkIdParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SpecialHours whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SpecialHours extends Model
{
protected $table='special_hours';
}
