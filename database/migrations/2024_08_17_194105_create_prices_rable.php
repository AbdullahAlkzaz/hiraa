<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        if (!Schema::hasTable('prices')) {
            Schema::create('prices', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->decimal('price', 10, 2);
                $table->string('coupon')->nullable();
                $table->unsignedInteger('coupon_time')->nullable();
                $table->text('features');
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
