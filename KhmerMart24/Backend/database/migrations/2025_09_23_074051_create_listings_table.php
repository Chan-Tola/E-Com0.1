<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Listing;
use App\Models\Category;
use App\Models\User;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(Listing::TABLENAME, function (Blueprint $table) {
            $table->id(Listing::ID);

            // Foreign keys
            $table->foreignId(Listing::USER_ID)
                ->constrained(User::TABLENAME)
                ->onDelete('cascade');

            $table->foreignId(Listing::CATEGORY_ID)
                ->constrained(Category::TABLENAME)
                ->onDelete('cascade');

            // Listing details
            $table->string(Listing::TITLE);
            $table->text(Listing::DESCRIPTION);
            $table->decimal(Listing::PRICE, 10, 2)->nullable();
            $table->string(Listing::CURRENCY, 3)->default('USD');

            $table->enum(Listing::CONDITION, [
                Listing::CONDITION_NEW,
                Listing::CONDITION_USED
            ])->default(Listing::CONDITION_USED);

            $table->enum(Listing::STATUS, [
                Listing::STATUS_ACTIVE,
                Listing::STATUS_SOLD
            ])->default(Listing::STATUS_ACTIVE);

            // Contact and location
            $table->json(Listing::IMAGES)->nullable();
            $table->string(Listing::CONTACT_PHONE);
            $table->string(Listing::CONTACT_EMAIL)->nullable();
            $table->string(Listing::LOCATION);

            // Metadata
            $table->integer(Listing::VIEW_COUNT)->default(0);
            $table->boolean(Listing::IS_FEATURED)->default(false);

            $table->timestamps();

            // Indexes
            $table->index(Listing::USER_ID);
            $table->index(Listing::CATEGORY_ID);
            $table->index(Listing::STATUS);
            $table->index(Listing::IS_FEATURED);
            $table->index([Listing::STATUS, Listing::IS_FEATURED]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Listing::TABLENAME);
    }
};
