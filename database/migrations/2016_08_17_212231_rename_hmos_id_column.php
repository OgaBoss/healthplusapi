<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameHmosIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('hmos_users', function(Blueprint $table) {
            $table->renameColumn('hmos_id', 'hmo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('hmos_users', function(Blueprint $table) {
            $table->renameColumn('hmo_id', 'hmos_id');
        });
    }
}
