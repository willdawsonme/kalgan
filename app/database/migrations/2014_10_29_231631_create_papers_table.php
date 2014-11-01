<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('mysql_applications')->create('papers', function($table)
        {
            $table->increments('id');
            $table->integer('application_id')->unsigned();
            $table->string('title');
            $table->string('type');
            $table->text('journal_quality')->nullable();
            $table->boolean('accepted');
            $table->boolean('herdc_points');
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
		Schema::connection('mysql_applications')->drop('papers');
	}

}
