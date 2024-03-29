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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();   
            /*$table->uuid('uuid')->unique();     */  
            $table->string('token');
            $table->string('name');
            $table->string('vorname');
            $table->string('identifikation')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telefonnummer')->nullable();
            $table->string('geburtstag')->nullable();
            $table->string('geburtsort')->nullable();
            $table->string('straße')->nullable();
            $table->string('plz')->nullable();
            $table->string('ort')->nullable();
            $table->string('land')->nullable();
            $table->string('profileimg')->nullable();       
            $table->string('tags')->nullable(); 
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->cascadeOnDelete();    
            $table->string('full_name')->virtualAs('concat(name, \' \', vorname)');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
