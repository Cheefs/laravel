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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок');
            $table->text('text')->comment("Текст новости");
            $table->text('category_id')->comment("ID категории");
            $table->boolean('is_private')->default(false)->comment("Новость приватна");
            $table->string('image')->nullable(true)->comment("Фото новости");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('news');
    }
}
