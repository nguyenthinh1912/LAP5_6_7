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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('poster')->nullable();
            $table->string('intro');
            $table->dateTime('release_date');
            $table->unsignedBigInteger('gene_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('gene_id')->references('id')->on('genes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
