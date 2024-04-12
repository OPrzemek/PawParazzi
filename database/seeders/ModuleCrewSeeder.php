<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ModuleCrew;

class ModuleCrewSeeder extends Seeder
{
    public function run()
    {
        DB::table('module_crew')->insert([
            ['ship_module_id' => 1, 'nick' => 'Tom', 'gender' => 'M', 'age' => 44],
            ['ship_module_id' => 2, 'nick' => 'Gillian', 'gender' => 'F', 'age' => 42],
            ['ship_module_id' => 3, 'nick' => 'Becky', 'gender' => 'F', 'age' => 19],
        ]);
    }
}
