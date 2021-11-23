<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SkillLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_levels')->insert([[
                'name' => "Beginner",
                'slug' => 'beginner',
                'status' => 1,
            ],
            [
                'name' => "Intermediate",
                'slug' => 'intermediate',
                'status' => 1,
            ],
            [
                'name' => "Expert",
                'slug' => 'expert',
                'status' => 1,
            ]
        ]
        );


    }
}
