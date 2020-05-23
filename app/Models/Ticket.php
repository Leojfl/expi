<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property float $total
 * @property float $discount
 * @property string $start
 * @property string $end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $fk_id_parking
 * @property int $fk_id_user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereFkIdParking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ticket extends Model
{
    protected $table = 'ticket';

    public function parking()
    {
        return $this->belongsTo(Parking::class,
            'fk_id_parking');
    }
}
