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
        // Create the 'users' table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // User name
            $table->string('email')->unique(); // User email, must be unique
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->string('password'); // User password
            $table->integer('roles')->default(4); // Roles column with a default value of 4 (for general users)
            $table->rememberToken(); // Remember token for authentication
            $table->timestamps(); // Timestamps for created_at and updated_at
        });

        // Create the 'password_reset_tokens' table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Primary key: email
            $table->string('token'); // Token for password reset
            $table->timestamp('created_at')->nullable(); // Creation timestamp
        });

        // Create the 'sessions' table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key: session ID
            $table->foreignId('user_id')->nullable()->index(); // Foreign key: user ID
            $table->string('ip_address', 45)->nullable(); // IP address of the user
            $table->text('user_agent')->nullable(); // User agent string
            $table->longText('payload'); // Session payload
            $table->integer('last_activity')->index(); // Timestamp of the last activity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'users' table
        Schema::dropIfExists('users');

        // Drop the 'password_reset_tokens' table
        Schema::dropIfExists('password_reset_tokens');

        // Drop the 'sessions' table
        Schema::dropIfExists('sessions');
    }
};
