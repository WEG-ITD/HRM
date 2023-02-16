<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateTable extends Migration
{
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->enum('page_layout', ['A4 Portrait', 'A4 Landscape']);
            $table->enum('user_photo_style', ['Round', 'Square']);
            $table->integer('layout_spacing_top');
            $table->integer('layout_spacing_bottom');
            $table->integer('layout_spacing_right');
            $table->integer('layout_spacing_left');
            $table->string('signature_image')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('background_image')->nullable();
            $table->text('certificate_content');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
