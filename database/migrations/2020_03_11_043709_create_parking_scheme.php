<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingScheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('parking_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
        });
        Schema::create('parking', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->double("ranking", 10, 2);
            $table->boolean("active")->default(true);
            $table->unsignedBigInteger("fk_id_user");
            $table->unsignedBigInteger("fk_id_parking_type");

            $table->foreign("fk_id_user")
                ->references('id')
                ->on("user");

            $table->foreign("fk_id_parking_type")
                ->references('id')
                ->on("parking_type");
            $table->timestamps();
        });
        Schema::create('parking_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double("amount", 13, 2);
            $table->date("date");
            $table->unsignedBigInteger("fk_id_parking");

            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");
            $table->timestamps();
        });
        Schema::create('special_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("description");
            $table->date("date");

            $table->time("start");
            $table->time("end");
            $table->boolean("active")->default(true);

            $table->unsignedBigInteger("fk_id_parking");

            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");
            $table->timestamps();
        });

        Schema::create('day', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
        });
        Schema::create('hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->time("start");
            $table->time("end");

            $table->unsignedBigInteger("fk_id_parking");

            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");

            $table->unsignedBigInteger("fk_id_day");

            $table->foreign("fk_id_day")
                ->references('id')
                ->on("day");
        });
        Schema::create('special', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('pension')->default(false);
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger("fk_id_user");
            $table->foreign("fk_id_user")
                ->references('id')
                ->on("user");

            $table->unsignedBigInteger("fk_id_parking");
            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");
            $table->timestamps();
        });

        Schema::create('pension_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double("amount", 13, 2);
            $table->date("date");
            $table->unsignedBigInteger("fk_id_special");

            $table->foreign("fk_id_special")
                ->references('id')
                ->on("special");
            $table->timestamps();
        });

        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double("latitude");
            $table->double("longitude");
            $table->boolean('active')->default(true);

            $table->unsignedBigInteger("fk_id_parking");

            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");
            $table->timestamps();
        });

        Schema::create('terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('terms');
            $table->timestamps();
        });

        Schema::create('ticket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('total');
            $table->double('discount');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps();

            $table->unsignedBigInteger("fk_id_parking");

            $table->unsignedBigInteger("fk_id_user");

            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");

            $table->foreign("fk_id_user")
                ->references('id')
                ->on("user");
        });


        Schema::create('tariff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->double('price');
            $table->dateTime('time');
            $table->timestamps();
            $table->unsignedBigInteger("fk_id_parking");
            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff');
        Schema::dropIfExists('ticket');
        Schema::dropIfExists('terms');
        Schema::dropIfExists('address');
        Schema::dropIfExists('pension_payment');
        Schema::dropIfExists('special');
        Schema::dropIfExists('hours');
        Schema::dropIfExists('day');
        Schema::dropIfExists('special_hours');
        Schema::dropIfExists('parking_payment');
        Schema::dropIfExists('parking');
        Schema::dropIfExists('parking_type');

    }
}
