<?php

use Illuminate\Database\Seeder;

class TrailSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'categories' => [1, 2],
                'courses' => [1, 2, 3],
            ],
            2 => [
                'categories' => [1],
                'courses' => [1, 2],
            ],
            3 => [
                'categories' => [2],
                'courses' => [3],
            ],

        ];

        foreach ($items as $id => $item) {
            $trail = \App\Trail::find($id);

            foreach ($item as $key => $ids) {
                $trail->{$key}()->sync($ids);
            }
        }
    }
}
