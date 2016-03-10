<?php

class Create_Subjects_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('Subjects',function($table)
                {
                   $table->increments('id');
                   $table->integer('course_id')->unsigned();
                   $table->date('syllabus_start_date');
                   $table->string('subject',50);
                   $table->integer('fullmark')->unsigned();
                   $table->integer('passmark')->unsigned();
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
		Schema::drop('Subjects');
	}

}