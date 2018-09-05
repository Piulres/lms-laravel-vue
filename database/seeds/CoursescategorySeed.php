<?php

use Illuminate\Database\Seeder;

class CoursescategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'cat_course_1',],
            ['id' => 2, 'title' => 'cat_course_2',],

        ];

        foreach ($items as $item) {
            \App\Coursescategory::create($item);
        }
    }
}
