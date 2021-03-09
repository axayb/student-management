<?php

namespace Database\Seeders;

use App\Models\Teachers;
use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Teachers::Create(
           ['name'=>'Katie']
       );
       Teachers::Create(
        ['name'=>'Max']
    );
    }
}
