<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('sales')->default(0);
            $table->integer('orders')->default(0);
            $table->integer('customers')->default(0);
            $table->integer('products')->default(0);
            $table->decimal('revenue', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
