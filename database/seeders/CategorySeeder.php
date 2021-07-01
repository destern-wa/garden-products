<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Plants',
                'description' => 'Plants of all shapes and sizes',
                'slug' => 'plants',
                'picture' => 'pexels-uriel-mont-6280462.jpg',
                'id' => 100
            ],
            [
                'name' => 'Fragrant',
                'description' => 'Fragrant plants to give you something nice to smell',
                'slug' => 'plants-fragrant',
                'parent_category_id' => 100,
                'id' => 101
            ],
            [
                'name' => 'Fruits',
                'description' => 'Plants that grow something yummy',
                'slug' => 'plants-fruit',
                'parent_category_id' => 100,
                'id' => 102
            ],
            [
                'name' => 'Herbs',
                'description' => 'Plants to spice up your cooking',
                'slug' => 'plants-herbs',
                'parent_category_id' => 100,
                'id' => 103
            ],
            [
                'name' => 'Ground covers',
                'description' => 'The name says it all',
                'slug' => 'plants-ground-covers',
                'parent_category_id' => 100,
                'id' => 104
            ],
            [
                'name' => 'Natives',
                'description' => 'All-Australian enviro-friendly plants',
                'slug' => 'plants-natives',
                'parent_category_id' => 100,
                'id' => 105
            ],
            [
                'name' => 'Indoor',
                'description' => 'Bring some fresh life into your home',
                'slug' => 'plants-indoor',
                'parent_category_id' => 100,
                'id' => 106
            ],
            [
                'name' => 'Hedges',
                'description' => 'For the privacy lovers',
                'slug' => 'plants-hedges',
                'parent_category_id' => 100,
                'id' => 107
            ],
            [
                'name' => 'Potted',
                'description' => 'Quick and easy potted plants',
                'slug' => 'plants-potted',
                'parent_category_id' => 100,
                'id' => 108
            ],
            [
                'name' => 'Roses',
                'description' => 'For traditional beauty',
                'slug' => 'plants-roses',
                'parent_category_id' => 100,
                'id' => 109
            ],
            [
                'name' => 'Bulbs',
                'description' => 'Grow your own',
                'slug' => 'plants-bulbs',
                'parent_category_id' => 100,
                'id' => 110
            ],

            [
                'name' => 'Pots',
                'slug' => 'pots',
                'picture' => 'piqsels.com-id-jzcvk.jpg',
                'id' => 200
            ],
            [
                'name' => 'Gifts',
                'slug' => 'gifts',
                'picture' => 'pexels-lisa-fotios-6041936.jpg',
                'id' => 300
            ],
            [
                'name' => 'Garden tools',
                'slug' => 'garden-tools',
                'picture' => 'piqsels.com-id-zmdrl.jpg',
                'id' => 400
            ],
            [
                'name' => 'Fertilisers',
                'slug' => 'fertilisers',
                'picture' => 'piqsels.com-id-fawyc.jpg',
                'id' => 500
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
