<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Client;
use App\Models\PolicyStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_policy_information', function (Blueprint $table) {
            $table->id();
            $table->string('policy_name');
            $table->string('policy_number')->nullable();
            $table->string('policy_provider')->nullable();
            $table->date('policy_start_date')->nullable();
            $table->date('policy_end_date')->nullable();
            $table->date('policy_due_date')->nullable();
            $table->decimal('policy_amount', 15, 2)->nullable();
            $table->string('policy_currency')->nullable();
            $table->foreignIdFor(PolicyStatus::class, 'policy_status_id')->nullable();
            $table->foreignIdFor(Client::class, 'client_id');
            $table->integer('policy_owner_id')->unsigned()->nullable();
            $table->boolean('policy_owner_self')->default(true);
            $table->integer('policy_insured_id')->unsigned()->nullable();
            $table->boolean('policy_insured_self')->default(true);
            $table->string('relationship_to_the_policy_owner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_policy_information');
    }
};
