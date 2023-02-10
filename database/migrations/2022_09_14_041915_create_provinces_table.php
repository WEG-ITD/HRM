<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name_kh', 100)->nullable();
            $table->string('name_en', 100)->nullable();
            $table->string('code', 100)->nullable();
            $table->string('city_name_kh', 100)->nullable();
            $table->string('city_name_en', 100)->nullable();
            $table->string('reference', 100)->nullable();
            $table->string('note', 100)->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('provinces');
    }
}
