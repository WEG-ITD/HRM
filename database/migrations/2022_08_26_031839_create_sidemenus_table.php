<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidemenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidemenus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id');
            $table->string('icon');
            $table->string('name');
            $table->string('link');
            $table->tinyInteger('type')->default('1');//1-item,0-group
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('is_report')->default('1');
            $table->integer('ordering')->default('1');
            $table->integer('parentId')->default('0');
            $table->foreignId('created_by')->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('sidemenus');
    }
}
