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
        Schema::table('users', function (Blueprint $table) {
            $table->string("phone")->nullable()->after("email");
            $table->string("id_number")->nullable()->after("email");
            $table->string("id_image_front")->nullable()->after("email");
            $table->string("id_image_back")->nullable()->after("email");
            $table->string("date_of_pirth")->nullable()->after("email");
            $table->enum("gender",[0,1,2])->nullable()->after("email");
            $table->string("address_1")->nullable()->after("email");
            $table->string("address_2")->nullable()->after("email");
            $table->string("government")->nullable()->after("email");
            $table->string("city")->nullable()->after("email");
            $table->string("area")->nullable()->after("email");
            $table->string("postal_code")->nullable()->after("email");
            $table->string("shop_name")->nullable()->after("email");
            $table->string("product_category")->nullable()->after("email");
            $table->string("shop_logo")->nullable()->after("email");
            $table->string("shop_address")->nullable()->after("email");
            $table->tinyInteger("approved")->default(0)->after("email");
            $table->tinyInteger("activity_type")->nullable()->after("email");
            $table->tinyInteger("breakable_product")->nullable()->after("email");
            $table->integer("company_id")->nullable()->after("email");
            $table->integer("office_id")->nullable()->after("email");
            $table->tinyInteger("is_seller")->nullable()->after("email");
            $table->string("image")->nullable()->after("email");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("phone");
            $table->dropColumn("image");
            $table->dropColumn("id_number");
            $table->dropColumn("id_image_front");
            $table->dropColumn("id_image_back");
            $table->dropColumn("date_of_pirth");
            $table->dropColumn("gender");
            $table->dropColumn("address_1");
            $table->dropColumn("address_2");
            $table->dropColumn("government");
            $table->dropColumn("city");
            $table->dropColumn("area");
            $table->dropColumn("postal_code");
            $table->dropColumn("shop_name");
            $table->dropColumn("product_category");
            $table->dropColumn("shop_logo");
            $table->dropColumn("shop_address");
            $table->dropColumn("approved");
            $table->dropColumn("activity_type");
            $table->dropColumn("breakable_product");
            $table->dropColumn("company_id");
            $table->dropColumn("office_id");
            $table->dropColumn("is_seller");
        });
    }
};
