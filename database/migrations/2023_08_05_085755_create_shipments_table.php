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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string("receiver_name")->nullable();
            $table->string("receiver_phone")->nullable();
            $table->string("receiver_address")->nullable();
            $table->string("receiver_government")->nullable();
            $table->string("receiver_area")->nullable();
            $table->string("receiver_id")->nullable();
            $table->string("sender_name")->nullable();
            $table->string("sender_phone")->nullable();
            $table->string("sender_address")->nullable();
            $table->string("sender_government")->nullable();
            $table->string("sender_area")->nullable();
            $table->string("sender_id")->nullable();
            $table->text("product_description")->nullable();
            $table->integer("product_count")->nullable();
            $table->string("shipment_size")->nullable();
            $table->integer("company_id")->nullable();
            $table->integer("office_id")->nullable();
            $table->integer("point_price")->nullable();
            $table->double("client_price")->nullable();
            $table->string("money_transfer_type")->nullable();
            $table->string("note")->nullable();
            $table->foreignId("user_id")->constrained();
            $table->tinyInteger("open_shipment")->default(0);
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
        Schema::dropIfExists('shipments');
    }
};
