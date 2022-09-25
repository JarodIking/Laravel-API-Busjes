<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('renter_id');
            $table->char('vehicle_name', 100);
            $table->integer('volume_max');
            $table->double('daily_price');
            $table->double('km_price');

            $table->foreign('renter_id')->references('id')->on('renters');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('vehicles');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
