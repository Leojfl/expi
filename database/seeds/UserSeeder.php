<?php

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->rol();
        $this->admin();
    }
    public function rol(){
        \DB::table('rol')->insert([
            ['name' => 'Admin', 'id' => 1],
            ['name' => 'Estacionamiento', 'id' => 2],
            ['name' => 'Cliente', 'id' => 3],
        ]);
    }

    public function admin(){
        $admin = new User();
        $admin->name = 'admin';
        $admin->last_name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password =Hash::make('prueba');
        $admin->fk_id_rol = Rol::ADMIN;
        $admin->save();
    }
}
