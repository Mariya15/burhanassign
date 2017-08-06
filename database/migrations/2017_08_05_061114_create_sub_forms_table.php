<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->char('project_name', 120);
            $table->enum('project_type', ['Residential', 'Commercial', 'Other']);
//            $table->enum('services', ['Detailing', 'Estimating', 'Design', 'Construction', 'Review', 'Inspection']);
            $table->text('comments')->nullable();
            $table->boolean('terms_and_conditions');
            $table->softDeletes();
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
        Schema::dropIfExists('sub_forms');
    }
}
