<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('description',255);
            $table->string('caste',255);
            $table->string('cost',255);
            $table->integer('total_profile_limit');
            $table->integer('daily_profile_limit');
            $table->integer('total_contact_limit');
            $table->integer('daily_contact_limit');
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
        Schema::dropIfExists('memberships');
    }
}
