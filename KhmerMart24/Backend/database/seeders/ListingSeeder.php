<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // note: Get category IDs
        $electronicCategoryId = Category::where(Category::SLUG, 'electronics')->first();
        $vehicleCategoryId = Category::where(Category::SLUG, 'vehicles')->first();

        //note: Check if categories exist
        if (!$electronicCategoryId || !$vehicleCategoryId) {
            $this->command->error('Categories not found! Please run CategorySeeder first.');
            return;
        }

        // note: Get a user (or create one if none exists)
        $user = User::first();
        // note: If no user exists, create a default one
        if (!$user) {
            $user = User::create([  // FIXED: created -> create
                User::USERNAME      => 'K24Testing',
                User::FULLNAME      => 'Sok San',
                User::EMAIL         => 'soksan123@gmail.com',
                User::PASSWORD      => bcrypt('12345678910'),
                User::PHONE_NUMBER  => '016354159',
                User::USER_TYPE     => User::USER_TYPE_INDIVIDUALT, // FIXED: Remove extra 'T'
                User::STATUS        => User::STATUS_ACTIVE,
                User::PROFILE_IMAGE => null,
            ]);
        }

        // note: Create Electronics Listing
        Listing::create([
            Listing::USER_ID => $user->id,
            Listing::CATEGORY_ID => $electronicCategoryId->id,
            Listing::TITLE => 'iPhone 15 Pro Max - Brand New',
            Listing::DESCRIPTION => 'Brand new iPhone 15 Pro Max 256GB. Still sealed in original box. Full warranty included. Latest model with advanced camera features.',
            Listing::PRICE => 1200.00,
            Listing::CURRENCY => 'USD',
            Listing::CONDITION => Listing::CONDITION_NEW,
            Listing::STATUS => Listing::STATUS_ACTIVE,
            Listing::IMAGES => null,
            Listing::CONTACT_PHONE => '096354159',
            Listing::CONTACT_EMAIL => 'seller@example.com',
            Listing::LOCATION => 'Phnom Penh',
            Listing::VIEW_COUNT => 45,
            Listing::IS_FEATURED => true,
            Listing::CREATED_AT => now(),
            Listing::UPDATED_AT => now(),
        ]);
        Listing::create([
            Listing::USER_ID => $user->id,
            Listing::CATEGORY_ID => $vehicleCategoryId->id,
            Listing::TITLE => 'Toyota Camry 2020 - Excellent Condition',
            Listing::DESCRIPTION => 'Well maintained Toyota Camry 2020 model. Low mileage, regular service history.',
            Listing::PRICE => 18500.00,
            Listing::CURRENCY => 'USD',
            Listing::CONDITION => Listing::CONDITION_USED,
            Listing::STATUS => Listing::STATUS_ACTIVE,
            Listing::IMAGES => null,
            Listing::CONTACT_PHONE => '+85598765432',
            Listing::CONTACT_EMAIL => 'carseller@example.com',
            Listing::LOCATION => 'Siem Reap',
            Listing::VIEW_COUNT => 89,
            Listing::IS_FEATURED => false,
            Listing::CREATED_AT => now(),
            Listing::UPDATED_AT => now(),
        ]);

        $this->command->info('listings seeded successfully!');
    }
}
