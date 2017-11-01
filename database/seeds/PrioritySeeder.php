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
          ['code' => 1, 'name' => '最高'],
          ['code' => 2, 'name' => '中くらい'],
          ['code' => 3, 'name' => '最低'],
        ];
        DB::table('priorities')->insert($priorities);
    }
}
