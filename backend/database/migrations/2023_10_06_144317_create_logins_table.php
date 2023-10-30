<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->id();
            $table->text('ip');
            $table->text('login_type');
            $table->enum('status', ['success', 'failed', 'logout', 'finish']);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('device_id')->nullable()->constrained('devices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};
