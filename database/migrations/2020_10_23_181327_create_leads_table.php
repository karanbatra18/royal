<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('alternate_email')->nullable();;
            $table->string('gender')->nullable();;
            $table->date('dob')->nullable();;
            $table->string('phone');
            $table->string('alternate_phone')->nullable();;
            $table->string('comment')->nullable();;
            $table->string('hot')->nullable();;
            $table->string('source')->nullable();;
            $table->string('lead_status')->nullable();;
            $table->string('assign_user')->nullable();;
            $table->string('facebook_url')->nullable();;
            $table->string('linkedin_url')->nullable();;
            $table->string('country')->nullable();;
            $table->string('state')->nullable();;
            $table->string('city')->nullable();;
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
        Schema::dropIfExists('leads');
    }
}
