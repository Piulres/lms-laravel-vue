<?php

use Illuminate\Database\Seeder;

class TrailSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Trail #1',],
            ['id' => 2, 'title' => 'Trail #2',],
            ['id' => 3, 'title' => 'Trail #3',],

        ];

        foreach ($items as $item) {
            \App\Trail::create($item);
        }
    }
}
