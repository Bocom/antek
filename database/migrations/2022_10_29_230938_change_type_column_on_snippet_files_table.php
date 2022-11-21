<?php

use App\Enums\SnippetFileType;
use App\Models\SnippetFile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $files = SnippetFile::all()->map(function ($file) {
            return [
                'id' => $file->id,
                'type' => $file->type,
            ];
        });

        Schema::table('snippet_files', function (Blueprint $table) {
            $table->dropColumn('type');
        });
        Schema::table('snippet_files', function (Blueprint $table) {
            $table->string('type')->default(SnippetFileType::Text->value);
        });

        $files->each(function ($file) {
            SnippetFile::first($file['id'])->update(['type' => $file['type']]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $files = SnippetFile::all()->map(function ($file) {
            return [
                'id' => $file->id,
                'type' => match ($file->type) {
                    'attachment' => 'text',
                    default => $file->type,
                },
            ];
        });

        Schema::table('snippet_files', function (Blueprint $table) {
            $table->dropColumn('type');
        });

        Schema::table('snippet_files', function (Blueprint $table) {
            $table->enum('type', ['text', 'code'])->default('text');
        });

        $files->each(function ($file) {
            SnippetFile::first($file['id'])->update(['type' => $file['type']]);
        });
    }
};
