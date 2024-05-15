<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Office extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $office = new \App\Models\Office;
        $office->name = "Surabaya";
        $office->vehicle_owned = 0;
        $office->office_grade= "main";
        $office->save();
    }
}
