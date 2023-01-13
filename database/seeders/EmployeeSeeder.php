<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empolyeds')->insert([
            'nama' => 'muhamad Supriyanto',
            'jeniskelamin'=> 'cowo',
            'notelpon' => '089897754452',
        ]);
    }
}