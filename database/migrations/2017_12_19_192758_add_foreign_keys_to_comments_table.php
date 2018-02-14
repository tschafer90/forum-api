<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('thread_id', 'comments_ibfk_1')->references('id')->on('threads')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('user_id', 'comments_ibfk_2')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_ibfk_1');
            $table->dropForeign('comments_ibfk_2');
        });
    }
}
