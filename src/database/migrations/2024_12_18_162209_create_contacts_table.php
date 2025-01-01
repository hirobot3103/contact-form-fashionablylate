<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignID('category_id')->constrained('categories');
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->tinyInteger('gender');
            $table->string('email',255);
            $table->string('tel',255);
            $table->string('address',255);
            $table->string('building',255)->nullable();
            $table->text('detail');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
