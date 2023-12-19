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
        Schema::create('users_formations', function (Blueprint $table) {
            $table->id();
            $table->date('dateCandidature');
            $table->enum('status',['accepter',' refuser']);
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->foreignId('formations_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_formations');
    }
};
