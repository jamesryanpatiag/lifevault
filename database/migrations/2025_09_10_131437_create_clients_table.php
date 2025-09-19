<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\OccupationCategory;
use App\Models\Client;
use App\Models\NatureOfBusiness;
use App\Models\User;
use App\Models\ClientStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
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

            $table->foreignIdFor(ClientStatus::class, 'client_status_id')->nullable();

            $table->enum('employee_type', ['Employed', 'Self-Employed', 'Unemployed'])->nullable();
            $table->string('occupation')->nullable();
            $table->foreignIdFor(OccupationCategory::class, 'occupation_category_id')->nullable();
            $table->foreignIdFor(NatureOfBusiness::class, 'nature_of_business_id')->nullable();

            $table->timestamps();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->unique(['email', 'user_id'], 'user_client_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::table('clients', function (Blueprint $table) {
            $table->dropUnique('user_client_unique_index');
        });
    }
};
