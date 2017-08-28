<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('student_name')->nullable();
			$table->string('student_age')->nullable();
			$table->string('student_year')->nullable();
			$table->text('student_content')->nullable();
			$table->integer('center_id');
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
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
		Schema::drop('students');
	}

}
