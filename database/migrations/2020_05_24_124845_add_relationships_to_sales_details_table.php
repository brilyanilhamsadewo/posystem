<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_details', function(Blueprint $table) {
            $table->integer('nota_id')->unsigned()->change();
            $table->foreign('nota_id')->references('nota_id')->on('sales')->onUpdate('cascade')->onDelete('cascade');
                
            $table->integer('product_id')->unsigned()->change();
            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_details', function(Blueprint $table) {
            $table->dropForeign('sales_details_nota_id_foreign');
        });
        
        Schema::table('sales_details', function(Blueprint $table) {
            $table->dropIndex('sales_details_nota_id_foreign');
        });
        
        Schema::table('sales_details', function(Blueprint $table) {
            $table->integer('nota_id')->change();
        });

        Schema::table('sales_details', function(Blueprint $table) {
            $table->dropForeign('sales_details_product_id_foreign');
        });

        Schema::table('sales_details', function(Blueprint $table) {
            $table->dropIndex('sales_details_product_id_foreign');
        });

        Schema::table('sales_details', function(Blueprint $table) {
            $table->integer('product_id')->change();
        });
    }
}
