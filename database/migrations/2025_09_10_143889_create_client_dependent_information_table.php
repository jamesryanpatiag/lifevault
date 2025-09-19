<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Client;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_dependent_information', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class, 'client_id');
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birth_date');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('phone_number')->nullable();
            $table->string('email');
            $table->foreignIdFor(User::class, 'user_id');
            $table->text('address_1');
            $table->text('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('postal')->nullable();
            $table->string('avatar_url')->nullable();
            $table->decimal('percentage_of_benefit', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_dependent_information');
    }
};
