<?php

class Create_Mission_Gallery_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('MissionGalleries',function($table)
                {
                   $table->increments('id');
                   $table->string('item_name',50);
                   $table->string('description',250)->nullable();
                   $table->integer('quantity')->nullable();
                   $table->string('source',50)->nullable();
                   $table->date('date_of_registration')->nullable();
                   $table->string('remarks',50)->nullable();
                   $table->string('photo')->nullable();
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
		Schema::drop('MissionGalleries');
	}

}