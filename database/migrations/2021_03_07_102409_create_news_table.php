<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('news', function(Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок');
            $table->text('text')->comment("Текст новости");
            $table->unsignedBigInteger('category_id')->comment("ID категории");
            $table->boolean('is_private')->default(false)->comment("Новость приватна");
            $table->string('image')->nullable(true)->comment("Фото новости");
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('news_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('news', function(Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('news');
    }
}
