<?php

namespace Database\Seeders;

use App\Models\Level;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Super Admin'],
            ['name'=> 'Admin'],
            ['name'=> 'User'],
        ];

        Schema::disableForeignKeyConstraints();
        Level::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($data as $level) {
        Level::insert([
            'name' => $level['name'],
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        }
    }
}