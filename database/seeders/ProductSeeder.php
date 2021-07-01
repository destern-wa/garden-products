<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            // Pots
            [
                'name' => "10cm Italian Terracotta Pot",
                'picture' => "piqsels.com-id-fkcwk.jpg",
                'price' => 6.45,
                'category_id' => 200,
            ],
            [
                'name' => "Small patterned pot",
                'description' => 'Assorted designs available.',
                'picture' => "piqsels.com-id-spvlt.jpg",
                'price' => 5.00,
                'category_id' => 200,
            ],
            [
                'name' => "Coloured plastic pot",
                'picture' => "piqsels.com-id-zeiua.jpg",
                'price' => 0.98,
                'category_id' => 200,
            ],

            // Gifts
            [
                'name' => "Bag with rope handle",
                'picture' => "piqsels.com-id-ssamb.jpg",
                'price' => 11.25,
                'category_id' => 300,
            ],
            [
                'name' => "Mini magnets",
                'picture' => "piqsels.com-id-zbdiv.jpg",
                'price' => 2.90,
                'pricing_unit' => 'each',
                'category_id' => 300,
            ],
            [
                'name' => "Dreamcatchers",
                'picture' => "piqsels.com-id-jskse.jpg",
                'price' => 14.00,
                'pricing_unit' => 'each',
                'category_id' => 300,
            ],

            // Tools
            [
                'name' => "Rake with metal head",
                'picture' => "piqsels.com-id-irwto.jpg",
                'price' => 16.65,
                'category_id' => 400,
            ],
            [
                'name' => "Plastic watering can",
                'description' => "Assorted colours available",
                'picture' => "piqsels.com-id-fxuwn.jpg",
                'price' => 2.78,

                'category_id' => 400,
            ],
            [
                'name' => "Small plant tool kit",
                'description' => 'Set of tools',
                'picture' => "piqsels.com-id-sfmrv.jpg",
                'price' => 12.20,
                'pricing_unit' => 'set',
                'category_id' => 400
            ],

            // Fertilisers
            [
                'name' => "Eshelman Red Rose Farm Feed",
                'picture' => "16665883885_c76714d1f8_o.jpg",
                'price' => 22.90,
                'pricing_unit' => 'bag',
                'category_id' => 500,
            ],
            [
                'name' => "Clay's Plant Food",
                'picture' => "14779739291_6e16d95331_o.jpg",
                'price' => 7.99,
                'pricing_unit' => 'litre',

                'category_id' => 500,
            ],

            // Plants - fragrant
            [
                'name' => "Carolina Allspice",
                'picture' => "piqsels.com-id-zbczn.jpg",
                'price' => 12,
                'pricing_unit' => 'pot',
                'category_id' => 101,
            ],
            [
                'name' => "Geranium",
                'picture' => "piqsels.com-id-jjakr.jpg",
                'price' => 14.25,
                'pricing_unit' => 'pot',
                'category_id' => 101,
            ],

            // Plants - fruits
            [
                'name' => "Kumquat tree",
                'picture' => "piqsels.com-id-zqolp.jpg",
                'price' => 45.50,
                'category_id' => 102,
            ],
            [
                'name' => "Avocado tree",
                'picture' => "piqsels.com-id-fytuh.jpg",
                'price' => 33.60,
                'category_id' => 102,
            ],

            // Plants - herbs
            [
                'name' => "Potted Basil",
                'picture' => "piqsels.com-id-zbmof.jpg",
                'price' => 11.20,
                'category_id' => 103,
            ],
            [
                'name' => "Potted Dill",
                'picture' => "piqsels.com-id-oqini.jpg",
                'price' => 12.30,
                'category_id' => 103,
            ],

            // Plants - ground covers
            [
                'name' => "Seaside Daisy",
                'picture' => "piqsels.com-id-zkamh.jpg",
                'price' => 7.90,
                'pricing_unit' => 'pot',

                'category_id' => 104,
            ],
            [
                'name' => "Blue Marguerite",
                'picture' => "piqsels.com-id-zyugn.jpg",
                'price' => 8.15,
                'pricing_unit' => 'pot',
                'category_id' => 104,
            ],

            // Plants - natives
            [
                'name' => "Kangaroo paw",
                'picture' => "piqsels.com-id-zyxzb.jpg",
                'price' => 19.99,


                'category_id' => 105,
            ],
            [
                'name' => "Banksia varieties",
                'picture' => "522px-Banksiasolandri.jpg",
                'price' => 17.75,
                'pricing_unit' => '(from)',
                'category_id' => 105,
            ],

            // Plants - indoor
            [
                'name' => "Peace lily",
                'picture' => "piqsels.com-id-fygap.jpg",
                'price' => 10.98,
                'category_id' => 106,
            ],
            [
                'name' => "Ficus tree",
                'picture' => "piqsels.com-id-fthoi.jpg",
                'price' => 16.00,
                'category_id' => 106,
            ],

            // Plants - hedges
            [
                'name' => "English box hedge",
                'picture' => "piqsels.com-id-sbdcz.jpg",
                'price' => 9.45,
                'pricing_unit' => 'pot',
                'category_id' => 107,
            ],
            [
                'name' => "Buxus hedge",
                'picture' => "piqsels.com-id-srsqs.jpg",
                'price' => 11.15,
                'pricing_unit' => 'pot',
                'category_id' => 107,
            ],

            // Plants - potted
            [
                'name' => "Potted pansies",
                'picture' => "piqsels.com-id-spdqq.jpg",
                'price' => 4.99,
                'pricing_unit' => 'pot',
                'category_id' => 108,
            ],

            // Plants - roses
            [
                'name' => "Bulgarian red rose",
                'picture' => "piqsels.com-id-sjiqg.jpg",
                'price' => 22.88,
                'pricing_unit' => 'pot',
                'category_id' => 109,
            ],
            [
                'name' => "Various cut roses",
                'picture' => "piqsels.com-id-szqfx.jpg",
                'price' => 10,
                'pricing_unit' => 'bunch',
                'category_id' => 109,
            ],

            // Plants - bulbs
            [
                'name' => "Daffodil bulbs",
                'picture' => "piqsels.com-id-jxgnc.jpg",
                'price' => 21.50,
                'pricing_unit' => 'box of ten',
                'category_id' => 110,
            ],
            [
                'name' => "Tulip bulbs",
                'picture' => "piqsels.com-id-frryx.jpg",
                'price' => 25,
                'pricing_unit' => 'box of ten',
                'category_id' => 110,
            ]
        ];
        foreach ($products as $product) {
            $product['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product['name'])));
            Product::create($product);
        }
    }
}
