<?php

use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期データの投入
        $priorities = [
          ['primary_level' => 1, 'name' => '最高'],
          ['primary_level' => 2, 'name' => '中くらい'],
          ['primary_level' => 3, 'name' => '最低'],
        ];
        DB::table('priorities')->insert($priorities);
    }
}
