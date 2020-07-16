<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTweetedByToUserIdOnTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tweets', function (Blueprint $table) {
            //
            $table->renameColumn('tweeted_by', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            //
            $table->renameColumn('user_id', 'tweeted_by');
        });
    }
}
