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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('commande_id') -> constrained('orders') -> onDelete('cascade');
            $table -> enum('methode' , ['carte' , 'paypal' , 'virement' , 'especes']);
            $table -> enum('status',['en_attente' , 'reussi', 'echoue' , 'rembourse']) -> default('en_attente');
            $table -> decimal('montant',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
