<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferencesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_applications')->create('conferences', function($table)
        {
            $table->increments('id');
            $table->integer('application_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('url')->nullable();
            $table->datetime('conference_start');
            $table->datetime('conference_end');
            $table->string('region');
            $table->string('country');
            $table->string('city');
            $table->integer('conference_quality');
            $table->boolean('special_invitation')->default(false);
            $table->boolean('special_duties')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('application_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_applications')->drop('conferences');
    }

}
