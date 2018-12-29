<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForSaleSortBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->boolean('for_sale')->default(false);
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->integer('order_by')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('for_sale');
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('for_sale');
        });
    }
}
