<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class member_statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_statuses')->insert(
            [
                'id' => 1,
                'status_name' => 'ADMIN',
                'kuota' => 10000,
            ],
        );
        DB::table('member_statuses')->insert(
            [
                'id' => 2,
                'status_name' => 'VVIP',
                'kuota' => 5,
            ],
        );
        DB::table('member_statuses')->insert(
            [
                'id' => 3,
                'status_name' => 'VIP',
                'kuota' => 2,
            ],
        );
        DB::table('member_statuses')->insert(
            [
                'id' => 4,
                'status_name' => 'PRO',
                'kuota' => 1,
            ],
        );
        DB::table('member_statuses')->insert(
            [
                'id' => 5,
                'status_name' => 'FREE',
                'kuota' => 1,
            ],
        );
    }
}
