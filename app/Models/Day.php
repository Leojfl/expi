<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Day
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Day newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Day newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Day query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Day whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Day whereName($value)
 * @mixin \Eloquent
 */
class Day extends Model
{
    protected $table = 'day';

}
