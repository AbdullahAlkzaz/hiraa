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
        Schema::table('contact_methods', function (Blueprint $table) {
            $table->dropColumn(['method', 'value']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_methods', function (Blueprint $table) {
            $table->string('method')->nullable();
            $table->string('value')->nullable();
        });
    }
};
