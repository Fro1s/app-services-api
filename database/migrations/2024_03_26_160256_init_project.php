<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->enum('user_type', ['PROVIDER', 'SEEKER']); 
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->float('price'); 
            $table->string('provider_id');
            $table->string('category_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('service_availabilities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('day_of_week'); 
            $table->time('start_time'); 
            $table->time('end_time'); 
            $table->string('service_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('service_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('description');
            $table->date('preferred_date');
            $table->float('budget'); 
            $table->string('seeker_id');
            $table->string('category_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('rating'); 
            $table->text('comment')->nullable();
            $table->string('reviewer_id');
            $table->string('reviewed_id');
            $table->string('provider_id');
            $table->timestamps();
            $table->softDeletes();
        });

        // Chaves estrangeiras

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('provider_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories'); 
        });

        Schema::table('service_requests', function (Blueprint $table) {
            $table->foreign('seeker_id')->references('id')->on('users'); 
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('reviewer_id')->references('id')->on('users');
            $table->foreign('reviewed_id')->references('id')->on('users'); 
            $table->foreign('provider_id')->references('id')->on('users'); 
        });

        Schema::table('service_availabilities', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_availabilities');
        Schema::dropIfExists('service_requests');
        Schema::dropIfExists('reviews');
    }
};
