<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//创建permission表
		Schema::create('permissions',function($table){
			$table->increments('id', true)->unique();
			$table->string('code', 50);
			$table->string('name', 50)->index();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//删除permission表
		Schema::drop('permissons');
	}

}
