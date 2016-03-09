<?php

class Create_Gallery_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('Gallery',function($table)
                {
                   $table->increments('id');
                   $table->string('photo');
                   $table->string('title');
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
		Schema::drop('Gallery');
	}

}