<?php

class Create_Staffs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('Staffs',function($table)
                {
                   $table->increments('id');
                   $table->string('photo')->nullable();
                   $table->string('name',100);
                   $table->string('fname',100)->nullable();
                   $table->string('contact_no',50)->nullable();
                   $table->string('desig',100)->nullable();
                   $table->date('date_of_joining')->nullable();
                   $table->date('dob')->nullable();
                   $table->string('gender',10)->nullable();
                   $table->string('address',100)->nullable();
                   $table->string('qualification',100)->nullable();
                   $table->string('remarks')->nullable();
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
		Schema::drop('Staffs');
	}

}