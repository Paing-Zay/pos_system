<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('product_code')->unique(); // P001, P002
            $table->string('name');
            $table->string('category')->nullable();

            $table->decimal('price', 10, 2);
            $table->decimal('cost_price', 10, 2)->nullable();

            $table->integer('stock')->default(0);

            $table->string('status')->default('in_stock');

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
