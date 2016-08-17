<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateHmosTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('hmos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 200)->default('');
                $table->string('street', 200)->default('');
                $table->string('city', 200)->default('');
                $table->string('state', 200)->default('');
                $table->string('country', 200)->default('');
                $table->string('general_email', 200)->unique();
                $table->string('phone_office', 200)->default('');
                $table->string('phone_mobile', 200)->unique();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::drop('hmos');
        }
    }
