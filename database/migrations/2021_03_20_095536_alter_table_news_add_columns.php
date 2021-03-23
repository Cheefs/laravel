<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableNewsAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('news', function(Blueprint $table) {
            $table->string('link')->nullable()->comment('News link');
            $table->timestamp('pub_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('news', function(Blueprint $table) {
            $table->dropColumn('link');
            $table->dropColumn('pub_date');
        });
    }
}
