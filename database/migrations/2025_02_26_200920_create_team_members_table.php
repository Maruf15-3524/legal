<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('team_members', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('designation');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('experience_years');
        $table->string('fb_url');
        $table->string('twitter_url');
        $table->string('linkedin_url');
        $table->text('education')->nullable();
        $table->text('description')->nullable();
        $table->text('notable_cases')->nullable();
        $table->string('profile_picture')->nullable(); 
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
