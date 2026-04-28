<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('category')->default('general')->after('slug');
            $table->string('tags')->nullable()->after('category');
            $table->text('excerpt')->nullable()->after('body');
            $table->enum('status', ['draft', 'published'])->default('published')->after('excerpt');
            $table->unsignedBigInteger('views')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['category', 'tags', 'excerpt', 'status', 'views']);
        });
    }
};
