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
            $table->string("productName",191);
            $table->float("productPrice");
            $table->enum("status",["متوفر","غير متوفر"])->default("متوفر");
            $table->string("productDescription",255);
            $table->string("productStartDate",191);
            $table->string("productEndDate",191);
            $table->string("productIamge",255);
            $table->unsignedBigInteger("categoryId");
            $table->foreign("categoryId")->references("id")->on("categories");
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
