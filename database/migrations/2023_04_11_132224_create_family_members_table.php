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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->integer('partner_id');
            $table->integer('father_id');
            $table->integer('mother_id');
            $table->integer('relationship_id');
            $table->integer('generation');
            $table->string('name');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('born_date');
            $table->date('died');
            $table->string('born_city');
            $table->string('religion');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('blood_type');
            $table->string('occupation');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
