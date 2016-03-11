<?php

class Create_Student_Pivots_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('Student_Pivots',function($table)
                {
                   $table->increments('id');
                   $table->integer('course_id');
                   $table->integer('student_row');
                   $table->timestamps();
                });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('Student_Pivots');
	}

}