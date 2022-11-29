<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('address', 512)->nullable();
            $table->string('image')->nullable();
            $table->integer('device_os')->nullable();
            $table->integer('id_app')->nullable();
            $table->integer('id_session')->nullable();
            $table->integer('is_change_pass')->nullable();
            $table->boolean('actived')->nullable();
            $table->integer('id_employee_add')->nullable();
            $table->integer('id_employee_upd')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
