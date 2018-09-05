<?php

use Illuminate\Database\Seeder;

class TrailscategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'cat_trail_1',],
            ['id' => 2, 'title' => 'cat_trail_2',],

        ];

        foreach ($items as $item) {
            \App\Trailscategory::create($item);
        }
    }
}
