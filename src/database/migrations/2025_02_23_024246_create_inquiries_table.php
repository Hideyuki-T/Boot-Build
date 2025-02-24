<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();  // id (PK)
            // usersテーブルとの1:Nリレーション
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('message');                // message
            $table->string('status', 50);           // status
            $table->timestamps();                   // created_at, updated_at
            $table->softDeletes();                  // deleted_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
