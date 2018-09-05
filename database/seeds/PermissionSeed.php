<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'course_management_access',],
            ['id' => 18, 'title' => 'coursescategory_access',],
            ['id' => 19, 'title' => 'coursescategory_create',],
            ['id' => 20, 'title' => 'coursescategory_edit',],
            ['id' => 21, 'title' => 'coursescategory_view',],
            ['id' => 22, 'title' => 'coursescategory_delete',],
            ['id' => 23, 'title' => 'lesson_access',],
            ['id' => 24, 'title' => 'lesson_create',],
            ['id' => 25, 'title' => 'lesson_edit',],
            ['id' => 26, 'title' => 'lesson_view',],
            ['id' => 27, 'title' => 'lesson_delete',],
            ['id' => 28, 'title' => 'course_access',],
            ['id' => 29, 'title' => 'course_create',],
            ['id' => 30, 'title' => 'course_edit',],
            ['id' => 31, 'title' => 'course_view',],
            ['id' => 32, 'title' => 'course_delete',],
            ['id' => 33, 'title' => 'trail_management_access',],
            ['id' => 34, 'title' => 'trailscategory_access',],
            ['id' => 35, 'title' => 'trailscategory_create',],
            ['id' => 36, 'title' => 'trailscategory_edit',],
            ['id' => 37, 'title' => 'trailscategory_view',],
            ['id' => 38, 'title' => 'trailscategory_delete',],
            ['id' => 39, 'title' => 'trail_access',],
            ['id' => 40, 'title' => 'trail_create',],
            ['id' => 41, 'title' => 'trail_edit',],
            ['id' => 42, 'title' => 'trail_view',],
            ['id' => 43, 'title' => 'trail_delete',],
            ['id' => 44, 'title' => 'configuration_access',],
            ['id' => 55, 'title' => 'datacourse_access',],
            ['id' => 56, 'title' => 'datacourse_create',],
            ['id' => 57, 'title' => 'datacourse_edit',],
            ['id' => 58, 'title' => 'datacourse_view',],
            ['id' => 59, 'title' => 'datacourse_delete',],
            ['id' => 60, 'title' => 'datatrail_access',],
            ['id' => 61, 'title' => 'datatrail_create',],
            ['id' => 62, 'title' => 'datatrail_edit',],
            ['id' => 63, 'title' => 'datatrail_view',],
            ['id' => 64, 'title' => 'datatrail_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
