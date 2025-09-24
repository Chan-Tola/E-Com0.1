<?php

use App\Models\Category;
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
        Schema::create(Category::TABLENAME, function (Blueprint $table) {
            $table->id(Category::ID);
            $table->foreignId(Category::PARENT_ID)
                ->nullable()
                ->constrained(Category::TABLENAME, Category::ID)
                ->onDelete('cascade');
            $table->string(Category::NAME);
            $table->string(Category::NAME_KH);
            $table->string(Category::SLUG)->unique();
            $table->boolean(Category::IS_ACTIVE)->default(true);
            $table->integer(Category::SORT_ORDER)->default(0);
            $table->timestamps();

            // Indexes
            $table->index(Category::PARENT_ID);
            $table->index(Category::SLUG);
            $table->index(Category::IS_ACTIVE);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Category::TABLENAME);
    }
};
