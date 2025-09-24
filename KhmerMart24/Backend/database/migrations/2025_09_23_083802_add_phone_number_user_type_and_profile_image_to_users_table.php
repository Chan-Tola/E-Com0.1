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
            $table->string(User::PHONE_NUMBER)->nullable();
            $table->enum(User::USER_TYPE, [User::USER_TYPE_BUSSINESS, User::USER_TYPE_INDIVIDUALT])->default(User::USER_TYPE_INDIVIDUALT);
            $table->string(User::PROFILE_IMAGE)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(User::TABLENAME, function (Blueprint $table) {
            $table->dropColumn([User::PHONE_NUMBER, User::USER_TYPE, User::PROFILE_IMAGE]);
        });
    }
};
