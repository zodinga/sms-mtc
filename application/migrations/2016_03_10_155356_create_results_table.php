<?php

class Create_Results_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('Results',function($table)
                {
                   $table->increments('id');
                   $table->integer('s_id');
                   $table->integer('subj_id');
                   $table->integer('marks_scored');
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
		Schema::drop('Results');
	}

}