<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyConstraintsIntoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //1
        Schema::table('sub_forms', function(Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        //2
        Schema::table('sub_form_service',function(Blueprint $table){

            $table->foreign('sub_form_id')->references('id')->on('sub_forms')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('sub_form_service',function(Blueprint $table){

            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //2
        Schema::table('sub_form_service', function(Blueprint $table)
        {

            $table->dropForeign('sub_form_service_service_id_foreign');
        });
        Schema::table('sub_form_service', function(Blueprint $table)
        {
            $table->dropForeign('sub_form_service_sub_form_id_foreign');


        });

        //1
        Schema::table('sub_forms', function(Blueprint $table)
        {
            $table->dropForeign('sub_forms_user_id_foreign');
        });
    }
}
