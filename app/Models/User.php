<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    public function isAdmin(){
        if( Rol::ADMIN == $this->fk_id_rol){
            return true;
        }
        return false;
    }
}
