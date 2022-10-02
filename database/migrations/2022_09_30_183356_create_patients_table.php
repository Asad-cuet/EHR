<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->integer('age');
            $table->integer('weight');
            $table->text('address');
            $table->text('phone');
            $table->text('guardian_name')->nullable();
            $table->text('guardian_phone')->nullable();
            $table->text('relationship')->nullable();
            $table->text('login_id')->unique();
            $table->text('password');
            $table->integer('is_consulted')->default(0);
            $table->integer('is_cleared')->default(0);
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
        Schema::dropIfExists('patients');
    }
}
