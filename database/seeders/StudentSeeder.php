<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'Somchai Chaiyawan',
                'email' => 'somchai@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nattapong Siri',
                'email' => 'nattapong@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suda Thong',
                'email' => 'suda@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Arthit Maneepol',
                'email' => 'arthit@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ploy Anan',
                'email' => 'ploy@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kanya Rattanak',
                'email' => 'kanya@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
