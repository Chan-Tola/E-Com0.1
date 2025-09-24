<?php

use App\Models\User;
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
        Schema::table(User::TABLENAME, function (Blueprint $table) {
            // Rename 'name' column to 'username'
            if (Schema::hasColumn(User::TABLENAME, 'name')) {
                $table->renameColumn('name', 'username');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(User::TABLENAME, function (Blueprint $table) {
            // Reverse the change for rollback
            if (Schema::hasColumn(User::TABLENAME, 'username')) {
                $table->renameColumn('username', 'name');
            }
        });
    }
};
