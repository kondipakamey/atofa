<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('titre', 80);
			$table->string('etat', 80);
			$table->string('type', 80);
			$table->string('prix', 80);
			$table->text('description');
			$table->string('photo', 80);
			$table->integer('user_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('restrict')
				  ->onUpdate('cascade');
			$table->foreign('city_id')
				  ->references('id')
				  ->on('cities')
				  ->onDelete('restrict')
				  ->onUpdate('cascade');
			$table->foreign('category_id')
				  ->references('id')
				  ->on('categories')
				  ->onDelete('restrict')
				  ->onUpdate('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_user_id_foreign');
			$table->dropForeign('posts_category_id_foreign');
			$table->dropForeign('posts_city_id_foreign');
		});
		Schema::drop('posts');
    }
}
