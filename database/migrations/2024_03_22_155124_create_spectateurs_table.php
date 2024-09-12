<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Spectateur; 
use App\Models\Competition; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spectateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('competition_spectateur', function (Blueprint $table){
            $table->foreignIdFor(Competition::class);
            $table->foreignIdFor(Spectateur::class);
            $table->primary(['competition_id', 'spectateur_id']); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spectateurs');
    }
};
