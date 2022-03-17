<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('sku')->after('title');
            $table->string('status')->after('sku');
            $table->string('category')->default(null)->change();
            $table->dropColumn('price_type');
            $table->dropColumn('product_settings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('price_type');
            $table->string('product_settings');
        });
    }
}
