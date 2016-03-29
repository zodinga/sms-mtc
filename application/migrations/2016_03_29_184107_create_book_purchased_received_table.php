<?php

class Create_Book_Purchased_Received_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('BookPurchasedReceiveds',function($table)
                {
                   $table->increments('id');
                   $table->string('title',50);
                   $table->string('author_editors',100)->nullable();
                   $table->integer('quantity')->nullable();
                   $table->integer('price')->nullable();
                   $table->integer('purchasing_price')->nullable();
                   $table->date('date_of_purchase')->nullable();
                   $table->string('source',50)->nullable();
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
		Schema::drop('BookPurchasedReceiveds');
	}

}