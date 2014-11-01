<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->boolean('supervisor_approved')->default(0);
            $table->date('travel_start');
            $table->date('travel_end');
            $table->text('travel_justification');
            $table->string('research_strength')->nullable();
            $table->boolean('research_strength_support')->nullable();
            $table->integer('stage');
            $table->decimal('vc_conference_fund')->nullable();
            $table->decimal('funding_air_fares')->default(0);
            $table->decimal('funding_accomodation')->default(0);
            $table->decimal('funding_conference')->default(0);
            $table->decimal('funding_meals')->default(0);
            $table->decimal('funding_local_fares')->default(0);
            $table->decimal('funding_car_mileage')->default(0);
            $table->decimal('funding_other')->default(0);
            $table->string('pep_period')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('applications');
	}

}
