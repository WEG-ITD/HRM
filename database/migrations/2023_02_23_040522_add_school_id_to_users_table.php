<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->string('firstname_en', 256);
            $table->string('firstname_kh', 256);
            $table->string('lastname_en', 256);
            $table->string('lastname_kh', 256);
            $table->timestamp('birth_date')->nullable();
            $table->timestamp('joining_date')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('experience_details')->nullable();
            $table->string('total_experience', 256)->nullable();
            $table->string('profile_picture')->nullable();

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('religion_id')->references('id')->on('religions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('school_id');
            $table->dropForeign('location_id');
            $table->dropColumn('firstname_en');
            $table->dropColumn('firstname_kh');
            $table->dropColumn('lastname_en');
            $table->dropColumn('lastname_kh');
            $table->dropColumn('birth_date');
            $table->dropColumn('joining_date');
            $table->dropColumn('qualifications');
            $table->dropColumn('experience_details');
            $table->dropColumn('total_experience');
            $table->dropColumn('profile_picture');
        });
    }
}
