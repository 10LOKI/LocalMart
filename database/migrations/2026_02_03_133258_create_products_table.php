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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('vendeur_id') -> constrained('users') -> onDelete('cascade');
            $table -> foreignId('category_id') -> constrained('categories') -> onDelete('cascade');
            $table -> string('nom');
            $table -> text('description');
            $table -> decimal('prix',10,2);
            $table -> integer('stock') -> default(0);
            $table -> boolean('est_actif') -> default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
