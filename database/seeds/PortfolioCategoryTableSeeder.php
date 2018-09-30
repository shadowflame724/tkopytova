<?php

use Illuminate\Database\Seeder;
use App\Models\PortfolioCategory;

/**
 * Class PortfolioCategoryTableSeeder.
 */
class PortfolioCategoryTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Illustration',
                'slug' => 'illustration',

            ],
            [
                'title' => 'Painting',
                'slug' => 'painting'
            ]
        ];

        PortfolioCategory::insert($categories);
    }
}
