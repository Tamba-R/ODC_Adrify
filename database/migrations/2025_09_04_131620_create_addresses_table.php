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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->decimal('latitude', 10, 7); 
            $table->decimal('longitude', 10, 7); 
            $table->text('description')->nullable();
            $table->string('repere_local')->nullable(); 
            $table->string('adrify_code')->unique();
            $table->enum('statut', ['en_attente', 'validee', 'rejete'])->default('en_attente');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
