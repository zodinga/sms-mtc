<?php

class Create_Courses_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('Courses',function($table)
                {
                   $table->increments('id');
                   $table->string('course',50);
                   $table->string('duration',20);
                   $table->integer('no_of_subjs');
                   $table->string('remarks',50)->nullable();
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
		Schema::drop('Courses');
	}

}