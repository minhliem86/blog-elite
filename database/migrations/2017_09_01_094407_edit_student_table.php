<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students', function(Blueprint $table)
		{
			// $table->renameColumn('center', 'center_vi');
			// $table->renameColumn('student_content', 'student_content_vi');
			// $table->string('center_en')->after('center')->nullable();
			// $table->string('student_content_en')->after('student_content')->nullable();
			// $table->string('center_id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students', function(Blueprint $table)
		{
			// $table->renameColumn('center_vi', 'center');
			// $table->renameColumn('student_content_vi', 'student_content');
			// $table->dropColumn('center_en');
			// $table->dropColumn('student_content_en');
			// $table->dropColumn('center_id');
		});
	}

}
