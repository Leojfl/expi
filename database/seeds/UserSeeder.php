<?php

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use \App\Models\Special;
use \App\Models\Parking;
use \App\Models\ParkingType;
use \App\Models\Address;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $faker;

    public function run()
    {
        $this->faker = Faker\Factory::create('es_MX');
        $this->roles();
        $this->admin();
        $this->day();

        $this->typeParking();
        $this->parking();


        $this->userSpecial();
        $this->userPention();
        $this->userServices();


    }

    public function day()
    {
        \DB::table('day')->insert([
            ['name' => 'Lunes', 'id' => 1],
            ['name' => 'Martes', 'id' => 2],
            ['name' => 'Miercoles', 'id' => 3],
            ['name' => 'Jueves', 'id' => 4],
            ['name' => 'Viernes', 'id' => 5],
            ['name' => 'Sabado', 'id' => 6],
            ['name' => 'Domingo', 'id' => 7],
        ]);
    }

    public function roles()
    {
        \DB::table('rol')->insert([
            ['name' => 'Admin', 'id' => 1],
            ['name' => 'Estacionamiento', 'id' => 2],
            ['name' => 'Cliente', 'id' => 3],
        ]);
    }

    public function admin()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->last_name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = Hash::make('prueba');
        $admin->fk_id_rol = Rol::ADMIN;
        $admin->save();
    }

    public function typeParking()
    {
        DB::table('parking_type')->insert([
            'id' => 1,
            'name' => 'Estacionamiento',
        ]);

        DB::table('parking_type')->insert([
            'id' => 2,
            'name' => 'Pensión',
        ]);

        DB::table('parking_type')->insert([
            'id' => 3,
            'name' => 'Estacionamiento y pensión',
        ]);

    }

    public function parking()
    {
        $user = new User();
        $user->name = $this->faker->name;
        $user->last_name = $this->faker->lastName;
        $user->email = 'expi@expi.com.mx';
        $user->password = Hash::make('prueba');
        $user->fk_id_rol = Rol::PARKING;
        $user->save();

        $parking = new \App\Models\Parking();
        $parking->name = "Expi estacionamiento";
        $parking->ranking = 5;
        $parking->active = true;
        $parking->fk_id_user = $user->id;
        $parking->fk_id_parking_type = ParkingType::PARKING;
        $parking->save();


        $tariff = new \App\Models\Tariff();
        $tariff->title = "Menos de 15 minutos";
        $tariff->price = rand(20, 30);
        $tariff->time = 15;
        $tariff->fk_id_parking = $parking->id;
        $tariff->save();


        for ($x = 1; $x < 10; $x++) {
            $user = new User();
            $user->name = $this->faker->name;
            $user->last_name = $this->faker->lastName;
            $user->email = $this->faker->email;
            $user->password = Hash::make('prueba');
            $user->fk_id_rol = Rol::PARKING;
            $user->save();

            $parking = new Parking();
            $parking->name = "Estacionamiento " . $x;
            $parking->ranking = rand(1, 5);
            $parking->active = true;
            $parking->fk_id_user = $user->id;
            $parking->fk_id_parking_type = rand(1, 3);
            $parking->save();

            $address = new Address();
            $address->latitude = $this->faker->latitude;
            $address->longitude = $this->faker->longitude;
            $address->fk_id_parking = $parking->id;
            $address->save();
            for ($i = 1; $i <= 7; $i++) {

                $schedule = new \App\Models\Hours();
                $schedule->name = '';
                $schedule->start = \Carbon\Carbon::now()->addHours(-5)->toTimeString();
                $schedule->end = \Carbon\Carbon::now()->addHours(5)->toTimeString();
                $schedule->fk_id_parking = $parking->id;
                $schedule->fk_id_day = $i;
                $schedule->save();
            }

            $tariff = new \App\Models\Tariff();
            $tariff->title = "Menos o 15 minutos";
            $tariff->price = rand(20, 30);
            $tariff->time = 15.0;
            $tariff->fk_id_parking = $parking->id;
            $tariff->save();

        }
    }

    public function userSpecial()
    {
        for ($x = 1; $x < 30; $x++) {
            $user = new User();
            $user->name = $this->faker->name;
            $user->last_name = $this->faker->lastName;
            $user->email = $this->faker->email;
            $user->password = Hash::make('prueba');
            $user->fk_id_rol = Rol::CLIENT;
            $user->save();
            if ($x < 15) {
                $special = new Special();
                $special->fk_id_user = $user->id;
                $special->fk_id_parking = 1;
                $special->save();
            }
        }

    }

    public function userPention()
    {

    }

    public function userServices()
    {

    }
}
