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
            // إضافة الأعمدة الجديدة
            $table->integer('lecture_duration')->nullable()->after('price');
            $table->integer('sessions_per_week')->nullable()->after('lecture_duration');
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
            // حذف الأعمدة في حال الحاجة لإعادة الترحيل
            $table->dropColumn('lecture_duration');
            $table->dropColumn('sessions_per_week');
        });
    }
};
