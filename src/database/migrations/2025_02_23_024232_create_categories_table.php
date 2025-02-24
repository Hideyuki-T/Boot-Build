<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();                   // id (PK)
            $table->string('name');         // name
            $table->timestamps();           // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
