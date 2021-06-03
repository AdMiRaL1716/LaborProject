<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        $roles = [
            [
                'role' =>'admin',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'role' => 'support',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'role' => 'user',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
