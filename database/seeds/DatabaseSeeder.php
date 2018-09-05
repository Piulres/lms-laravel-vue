<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(CoursescategorySeed::class);
        $this->call(LessonSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(CourseSeed::class);
        $this->call(TrailscategorySeed::class);
        $this->call(TrailSeed::class);
        $this->call(CourseSeedPivot::class);
        $this->call(RoleSeedPivot::class);
        $this->call(TrailSeedPivot::class);
        $this->call(UserSeedPivot::class);

    }
}
