<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->rememberToken();
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
			$table->boolean('admin')->default(false);
			$table->string('phone', 60);
			$table->text('address');
			$table->string('postalCode', 60);
			$table->string('shopName', 60);
			$table->text('shopDescription');
			$table->string('shopPicture', 60);
			$table->integer('city_id')->unsigned();
			$table->foreign('city_id')
				  ->references('id')
				  ->on('cities')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
				  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_city_id_foreign');
		});
        Schema::drop('users');
    }
}
