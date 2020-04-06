<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyIdFieldInDiscussionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('discussions', function (Blueprint $table) {
      $table->integer('reply_id')->after('channel_id')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('discussions', function (Blueprint $table) {
      $table->dropColumn('reply_id');
    });
  }
}
