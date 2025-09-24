<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // note: Main Categories
        $mainCategories = [
            [
                Category::NAME => 'Vehicles',
                Category::NAME_KH => 'យានយន្ត',
                Category::SLUG => 'vehicles',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 1,
                Category::PARENT_ID => null,
            ],
            [
                Category::NAME => 'Properties',
                Category::NAME_KH => 'អចលនទ្រព្យ',
                Category::SLUG => 'properties',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 2,
                Category::PARENT_ID => null,
            ],
            [
                Category::NAME => 'Electronics',
                Category::NAME_KH => 'អេឡិកត្រូនិក',
                Category::SLUG => 'electronics',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 3,
                Category::PARENT_ID => null,
            ],
            [
                Category::NAME => 'Jobs',
                Category::NAME_KH => 'ការងារ',
                Category::SLUG => 'jobs',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 4,
                Category::PARENT_ID => null,
            ],
            [
                Category::NAME => 'Services',
                Category::NAME_KH => 'សេវាកម្ម',
                Category::SLUG => 'services',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 5,
                Category::PARENT_ID => null,
            ],
        ];

        // note: Insert main categories and get their IDs
        $mainCategoryIds = [];
        foreach ($mainCategories as $data) {
            $id = DB::table(Category::TABLENAME)->insertGetId($data);
            $mainCategoryIds[$data[Category::SLUG]] = $id;
        }

        // note: Sub-Categories for Vehicles

        $subCategories = [
            //note: Vehicles Sub-categories
            [
                Category::NAME => 'Cars',
                Category::NAME_KH => 'រថយន្ត',
                Category::SLUG => 'cars',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 1,
                Category::PARENT_ID => $mainCategoryIds['vehicles']
            ],
            [
                Category::NAME => 'Motorcycles',
                Category::NAME_KH => 'ម៉ូតូ',
                Category::SLUG => 'motorcycles',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 2,
                Category::PARENT_ID => $mainCategoryIds['vehicles']
            ],
            // note: Properties Sub-categories
            [
                Category::NAME => 'Apartments for Rent',
                Category::NAME_KH => 'ផ្ទះខ្នងជួល',
                Category::SLUG => 'apartments-rent',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 1,
                Category::PARENT_ID => $mainCategoryIds['properties']

            ],
            [
                Category::NAME => 'Houses for Sale',
                Category::NAME_KH => 'ផ្ទះលក់',
                Category::SLUG => 'houses-sale',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 2,
                Category::PARENT_ID => $mainCategoryIds['properties']
            ],
            // note: Electronics Sub-categories
            [
                Category::NAME => 'Mobile Phones',
                Category::NAME_KH => 'ទូរស័ព្ទ',
                Category::SLUG => 'mobile-phones',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 1,
                Category::PARENT_ID => $mainCategoryIds['electronics']

            ],
            [
                Category::NAME => 'Laptops & Computers',
                Category::NAME_KH => 'កំព្យូទ័រ',
                Category::SLUG => 'laptops-computers',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 2,
                Category::PARENT_ID => $mainCategoryIds['electronics']
            ],
            // note: Jobs Sub-categories
            [
                Category::NAME => 'IT & Programming',
                Category::NAME_KH => 'ព័ត៌មានវិទ្យា',
                Category::SLUG => 'it-programming',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 1,
                Category::PARENT_ID => $mainCategoryIds['jobs'],
            ],
            // note: Services Sub-categories
            [
                Category::NAME => 'Repair Services',
                Category::NAME_KH => 'សេវាជួសជុល',
                Category::SLUG => 'repair-services',
                Category::IS_ACTIVE => true,
                Category::SORT_ORDER => 1,
                Category::PARENT_ID => $mainCategoryIds['services'],
            ],
        ];
        // note: Insert sub-categories
        DB::table(Category::TABLENAME)->insert($subCategories);

        $this->command->info('Categories seeded successfully!');
    }
}
