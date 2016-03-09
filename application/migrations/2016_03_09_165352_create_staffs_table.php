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
                   $table->integer('yoj')->unsigned()->nullable();
                   $table->date('dob')->nullable();
                   $table->string('gender',10)->nullable();
                   $table->string('street',50)->nullable();
                   $table->string('town',50)->nullable();
                   $table->string('district',50)->nullable();
                   $table->string('state',50)->nullable();
                   $table->string('pin',10)->nullable();
                   $table->string('10_board',50)->nullable();
                   $table->string('10_year',10)->nullable();
                   $table->string('10_degree',50)->nullable();
                   $table->string('10_division',20)->nullable();
                   $table->string('12_board',50)->nullable();
                   $table->string('12_year',10)->nullable();
                   $table->string('12_degree',50)->nullable();
                   $table->string('12_division',20)->nullable();
                   $table->string('degree_board',50)->nullable();
                   $table->string('degree_year',20)->nullable();
                   $table->string('degree_degree',50)->nullable();
                   $table->string('degree_division',20)->nullable();
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