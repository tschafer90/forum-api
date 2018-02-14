<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->foreign('user_id', 'threads_ibfk_1')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('category_id', 'threads_ibfk_2')->references('id')->on('categories')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->dropForeign('threads_ibfk_1');
            $table->dropForeign('threads_ibfk_2');
        });
    }
}
