<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete()->after('id');
            $table->string('cover_image')->nullable()->after('description');
            $table->string('isbn')->nullable()->after('cover_image');
            $table->date('published_at')->nullable()->after('isbn');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropColumn(['author_id', 'cover_image', 'isbn', 'published_at']);
        });
    }
};
