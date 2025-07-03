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
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('admin_id')->comment('Primary key for admin users table'); // Using 'admin_id' as the primary key
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('admin'); // Default role for admin users
            $table->boolean('is_active')->default(true); // To manage active/inactive status           
            $table->string('phone_number')->nullable(); // Optional phone number field
            $table->string('address')->nullable(); // Optional address field
            $table->timestamp('last_login_at')->nullable(); // To track last login time
            $table->string('last_login_ip')->nullable(); // To track last login IP address
            $table->boolean('is_super_admin')->default(false); // To differentiate super admins from regular admins
            $table->boolean('is_verified')->default(false); // To track if the admin user is verified          
            $table->string('locale')->default('en'); // To support multiple languages
            $table->string('timezone')->default('UTC'); // To support different time zones
            $table->string('status')->default('active'); // To manage user status (active, inactive, suspended, etc.)
            $table->string('last_action')->nullable(); // To track the last action performed by the admin user            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
};
