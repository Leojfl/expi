<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    const ADMIN = 1;
    const PARKING = 2;
    const CLIENT = 2;

}
