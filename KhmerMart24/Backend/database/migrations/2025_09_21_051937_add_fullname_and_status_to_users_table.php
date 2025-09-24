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
            $table->string(User::FULLNAME)->nullable();
            $table->enum(User::STATUS, [User::STATUS_ACTIVE, User::STATUS_OFFLINE])->default(User::STATUS_OFFLINE);
            $table->timestamp(User::LAST_SEEN_AT)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(User::TABLENAME, function (Blueprint $table) {
            $table->dropColumn([User::FULLNAME, User::STATUS, User::LAST_SEEN_AT]);
        });
    }
};
