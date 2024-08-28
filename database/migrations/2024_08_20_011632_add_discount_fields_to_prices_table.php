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
        Schema::table('prices', function (Blueprint $table) {
            $table->decimal('final_price', 8, 2)->after('price')->nullable();
            $table->string('discount_type')->after('coupon')->nullable();
            $table->date('coupon_end_date')->nullable()->after('coupon_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->dropColumn(['final_price', 'discount_type', 'coupon_end_date']);
        });
    }
};
