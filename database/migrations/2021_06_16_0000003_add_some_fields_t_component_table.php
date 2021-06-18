<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsTComponentTable extends Migration
{
    public function up(): void
    {
        Schema::table('tailwind_components', function (Blueprint $table) {
            $table->string('desc')->nullable();
            $table->longText('code_vue')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('tailwind_components', function (Blueprint $table) {
            $table->dropColumn('desc');
            $table->dropColumn('code_vue');
        });
    }
}
