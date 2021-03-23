<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersAddNewColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users', function(Blueprint $table) {
            $table->bigInteger('social_id')->nullable()->comment('ID in social network');
            $table->string('auth_type')->nullable('Social network type');
            $table->string('avatar')->nullable()->comment('Avatar link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('social_id');
            $table->dropColumn('auth_type');
            $table->dropColumn('avatar');
        });
    }
}
