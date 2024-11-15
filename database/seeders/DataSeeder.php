<?php

namespace Database\Seeders;

use App\Models\Data;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Thomas',
                'levels_id'=> '3',
                'email'=> '@example.com',
                'phone'=> '08123456785'
            ],
            [
                'name' => 'Tomi',
                'levels_id'=> '3',
                'email'=> '@example2.com',
                'phone'=> '08123456786'
            ],
            [
                'name' => 'Tomo',
                'levels_id'=> '3',
                'email'=> '@example3.com',
                'phone'=> '08123456787'
            ],
            [
                'name' => 'Thoriq',
                'levels_id'=> '3',
                'email'=> '@example4.com',
                'phone'=> '08123456788'
            ],
        ];

        Schema::disableForeignKeyConstraints();
        Data::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($data as $values) {
        Data::insert([
            'name' => $values['name'],
            'levels_id'=> $values['levels_id'],
            'email' => $values['email'],
            'phone' => $values['phone'],
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        }
    }
}
