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
        Schema::create('shoppings', function (Blueprint $table) {
                $table->integer("id")->autoIncrement();
                $table->integer("id_product");
                $table->integer("id_user");
                $table->integer("quantity");
                $table->foreign("id_product")->references("id")->on("products")->onDelete("cascade");
                $table->foreign("id_user")->references("id")->on("users")->onDelete("cascade");
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoppings');
    }
};
