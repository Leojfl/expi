<?php


use App\Models\Address;
use App\Models\Parking;
use App\Models\ParkingType;
use App\Models\Rol;
use App\Models\Special;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public $faker;

    public function run()
    {
        $this->tickets();
    }

    public function tickets()
    {
        for ($i = 0; $i < 10000; $i++) {
            $random = \Carbon\Carbon::now()->subMinutes(rand(1, 1000));
            $random->setYear(rand(2017, 2020));
            $random->setMonth(rand(1, 12));
            $random->setDay(rand(1, 27));
            $ticket = new \App\Models\Ticket();
            $ticket->total = rand(20, 150);
            $ticket->discount = 0;
            $ticket->start = $random->toDateTimeString();
            $ticket->end = $random->addMinutes(rand(10, 50))->toDateTimeString();
            $ticket->fk_id_parking = 1;
            $ticket->fk_id_user = rand(20, 30);
            $ticket->save();
        }

    }


}
