<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatorToHmosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hmos', function (Blueprint $table) {
            //
            $table->string('logo_url')->default('');
            $table->boolean('activated')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hmos', function (Blueprint $table) {
            //
            $table->dropColumn('logo_url');
            $table->dropColumn('activated');

        });
    }
}
