<?php

class Add_New_Column_At_Student {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("students", function(Blueprint $table){
			$table->string("internal_registration")->after("fname");
			$table->string("university_registration")->after("fname");
			$table->enum('status',array('Ongoing','Discontinue','Suspend','Completed','Other'))->after("yoj");
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("students", function(Blueprint $table){
			$table->dropColumn("internal_registration");
			$table->dropColumn("university_registration");
			$table->dropColumn('status');
		});
	}

}