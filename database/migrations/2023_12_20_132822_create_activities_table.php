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
            // Morphs represents the code below. NullableMorphs make's them nullable.
//            $table->unsignedBigInteger('subject_id'); //9
//            $table->string('subject_type'); // App\Models\Task


        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->nullableMorphs('subject');
            $table->string('description');
            $table->text('changes')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
