<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCategoryTable extends Migration
{
    public function up(): void
    {
        Schema::create('tailwind_categories', function (Blueprint $table) {
            $table->bigIncrements('id');;
            $table->string('name');
            $table->string('slug');
            $table->integer('position');

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')
                ->references('id')
                ->on('tailwind_categories')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tailwind_categories');
    }
}

