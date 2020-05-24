<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned()->change();
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            
            $table->integer('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('sales_customer_id_foreign');
        });

        Schema::table('sales', function(Blueprint $table) {
            $table->dropIndex('sales_customer_id_foreign');
        });
    
        Schema::table('sales', function(Blueprint $table) {
            $table->integer('customer_id')->change();
        });
    
        Schema::table('sales', function(Blueprint $table) {
            $table->dropForeign('sales_user_id_foreign');
        });
        
        Schema::table('sales', function(Blueprint $table) {
            $table->dropIndex('sales_user_id_foreign');
        });
        
        Schema::table('sales', function(Blueprint $table) {
            $table->integer('user_id')->change();
        });
    }
}
