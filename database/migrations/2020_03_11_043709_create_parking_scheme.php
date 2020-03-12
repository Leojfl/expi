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
        Schema::create('pension', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("fk_id_user");
            $table->foreign("fk_id_user")
                ->references('id')
                ->on("user");

            $table->unsignedBigInteger("fk_id_parking");
            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");
        });

        Schema::create('pension_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double("amount", 13, 2);
            $table->date("date");
            $table->unsignedBigInteger("fk_id_pension");

            $table->foreign("fk_id_pension")
                ->references('id')
                ->on("pension");
            $table->timestamps();
        });

        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double("latitude", 13, 13);
            $table->double("longitude", 13, 13);
            $table->boolean('active')->default(true);

            $table->unsignedBigInteger("fk_id_parking");

            $table->foreign("fk_id_parking")
                ->references('id')
                ->on("parking");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
        Schema::dropIfExists('pension_payment');
        Schema::dropIfExists('pension');
        Schema::dropIfExists('hours');
        Schema::dropIfExists('day');
        Schema::dropIfExists('special_hours');
        Schema::dropIfExists('parking_payment');
        Schema::dropIfExists('parking');
        Schema::dropIfExists('parking_type');
    }
}
