<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 250);
            $table->string('lastname', 250);
            $table->string('username')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('role', ['admin', 'user', 'vendor'])->default('user');
            $table->string('email', 250)->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('avatar', 250)->nullable();
            $table->string('password', 250);
            $table->string('website', 250)->nullable();
            $table->string('city', 250)->nullable();
            $table->string('country', 250)->nullable();
            $table->string('zip', 250)->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // User::create(['first_name' => 'Toner','last_name' => 'Front','email' => 'admin@themesbrand.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'avatar-1.jpg','created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
