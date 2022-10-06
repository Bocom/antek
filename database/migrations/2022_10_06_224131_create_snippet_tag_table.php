<?php

use App\Models\Snippet;
use App\Models\Tag;
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
        Schema::create('snippet_tag', function (Blueprint $table) {
            $table->foreignIdFor(Snippet::class);
            $table->foreignIdFor(Tag::class);

            $table->unique(['snippet_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snippet_tag');
    }
};
