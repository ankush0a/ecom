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
      $table->id();
      $table->string('first_name');
      $table->string('last_name')->nullable();
      $table->string('slug');
      $table->string('email')->unique()->nullable();
      $table->integer('mobile')->unique()->nullable();
      $table->string('password')->nullable();
      $table->string('profile')->nullable();
      $table->string('role')->default('user');
      $table->boolean('super_admin')->default(0);
      $table->json('permission')->nullable();
      $table->unsignedTinyInteger('status')->default(0);
      $table->timestamp('email_verified_at')->nullable();
      $table->timestamp('mobile_verified_at')->nullable();
      $table->rememberToken();
      $table->unsignedInteger('created_by')->nullable();
      $table->unsignedInteger('updated_by')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
