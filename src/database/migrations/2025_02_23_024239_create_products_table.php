<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // id (PK)
            // categoriesテーブルとの1:Nリレーション
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');                         // name
            $table->text('description')->nullable();        // description
            $table->decimal('price', 10, 2);                  // price
            $table->integer('stock_quantity');              // stock_quantity
            $table->timestamps();                           // created_at, updated_at
            $table->softDeletes();                          // deleted_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
