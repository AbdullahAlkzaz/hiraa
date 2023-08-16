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
        Schema::create('office_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("office_id")->constrained("users",'id');
            $table->string("tax_number");
            $table->string("manager_name");
            $table->string("manager_phone");
            $table->string("manager_email");
            $table->string("manager_national_number");
            $table->tinyInteger("has_branches")->default(0);
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
        Schema::dropIfExists('office_details');
    }
};
