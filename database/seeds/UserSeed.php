<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'last_name' => 'Master', 'email' => 'admin@admin.com', 'website' => 'www.google.com', 'avatar' => null, 'password' => '$2y$10$.gVU/ScvMXIspXAyPkaNvuncOkaFyTUmtzcB9lVSIM/eYK5d0aEtO', 'remember_token' => '',],
            ['id' => 2, 'name' => 'User #1', 'last_name' => 'Last', 'email' => 'user1@user1.com', 'website' => 'www.google.com', 'avatar' => null, 'password' => '$2y$10$D43GKAvNvHI9O7XZU.QZA.VdigSoRw/XMsi63mlRfsRBYc1gw1F4i', 'remember_token' => null,],
            ['id' => 3, 'name' => 'User #2', 'last_name' => 'Last', 'email' => 'user2@user2.com', 'website' => 'www.google.com', 'avatar' => null, 'password' => '$2y$10$pvpqzZ9FuHyC2XGKqy0mYu7kYo3znH8kklj3R7hwH/8qP9ANn3X5q', 'remember_token' => null,],
            ['id' => 4, 'name' => 'User #3', 'last_name' => 'Last', 'email' => 'user3@user3.com', 'website' => 'www.google.com', 'avatar' => null, 'password' => '$2y$10$a8UfyFy2QEuQUOznXKePg.UCndpwR1gukDdUCLnIka.IZq3BLpm4m', 'remember_token' => null,],
            ['id' => 5, 'name' => 'User #4', 'last_name' => 'Last', 'email' => 'user4@user4.com', 'website' => 'www.google.com', 'avatar' => null, 'password' => '$2y$10$j/9jCKhwPmbpZTASp.bJw.AnBe/bZof71iwcOJc8nAmH1rjasL2fe', 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
