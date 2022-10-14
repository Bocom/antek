<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('snippet_files', function (Blueprint $table) {
            $table->enum('type', ['text', 'code'])->default('text');
            $table->string('syntax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('snippet_files', function (Blueprint $table) {
            $table->dropColumn('syntax');
            $table->dropColumn('type');
        });
    }
};
