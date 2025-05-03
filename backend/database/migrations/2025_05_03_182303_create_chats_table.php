<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            // Ez lesz a FŐ téma-csoport (Temu-Tricks, Carsharing-Tips és Error-Fares alapján), 
            // Kezdetnek csak egy base URL címet dob vissza majd meg vmi sample szöveget.
            $table->enum('response_family', ['Temu Tricks', 'Carsharing Tips', 'Error Fares']);
            $table->string('response_child', 50)->nullable(); // Ez lesz az al-témacsoport. Azaz majd a weboldalon belül hova navigálja a vendéget majd.
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
