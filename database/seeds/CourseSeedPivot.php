<?php

use Illuminate\Database\Seeder;

class CourseSeedPivot extends Seeder
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
                'instructor' => [1],
                'lessons' => [1, 2, 3, 4],
                'categories' => [1, 2],
            ],
            2 => [
                'instructor' => [1],
                'lessons' => [1, 2],
                'categories' => [1],
            ],
            3 => [
                'instructor' => [1],
                'lessons' => [3, 4],
                'categories' => [2],
            ],

        ];

        foreach ($items as $id => $item) {
            $course = \App\Course::find($id);

            foreach ($item as $key => $ids) {
                $course->{$key}()->sync($ids);
            }
        }
    }
}
