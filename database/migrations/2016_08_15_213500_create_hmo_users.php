<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateHmoUsers extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('hmos_users', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('hmos_id')->unsigned();
                $table->timestamps();

                $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

                $table->foreign('hmos_id')
                    ->references('id')
                    ->on('hmos');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::drop('hmos_users');
        }
    }
