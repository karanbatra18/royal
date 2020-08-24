<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->string('height',100)->nullable();
            $table->string('religion',255)->nullable();
            $table->string('cast',20)->nullable();
            $table->string('sub_cast',20)->nullable();
            $table->string('mother_tongue',20)->nullable();
            $table->string('country',50)->nullable();
            $table->string('state',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('annual_income',255)->nullable();
            $table->string('profile_picture1',255)->nullable();
            $table->string('profile_picture2',255)->nullable();
            $table->string('weight',255)->nullable();
            $table->text('personal_detail')->nullable();
            $table->string('body_type',255)->nullable();
            $table->string('complexion',255)->nullable();
            $table->string('challanged',255)->nullable();
            $table->text('education')->nullable();
            $table->text('higher_education')->nullable();
            $table->text('college')->nullable();
            $table->text('school')->nullable();
            $table->text('about_career')->nullable();
            $table->text('employed_in')->nullable();
            $table->text('occupation')->nullable();
            $table->text('organization_name')->nullable();
            $table->time('birth_time')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('mangalik_status')->nullable();
            $table->tinyInteger('non_veg')->nullable()->default(0);
            $table->tinyInteger('drink')->nullable()->default(0);
            $table->tinyInteger('smoke')->nullable()->default(0);
            $table->tinyInteger('own_house')->nullable()->default(0);
            $table->tinyInteger('own_car')->nullable()->default(0);
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('gothra')->nullable();
            $table->string('family_income')->nullable();
            $table->tinyInteger('living_with_parents')->nullable()->default(0);
            $table->tinyInteger('abroad_willing')->nullable()->default(0);

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
        Schema::dropIfExists('user_profiles');
    }
}
