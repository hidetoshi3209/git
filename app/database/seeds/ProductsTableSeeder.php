<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'ぬいぐるみ',
            'price' => 1000,
            'comment' => 'サンプル',
            'condition' => 1,
            'image' => 'サンプル',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
