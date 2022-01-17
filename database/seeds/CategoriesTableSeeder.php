<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "バッグ",
        ]);
        DB::table('categories')->insert([
            'name' => "Tシャツ",
        ]);
        DB::table('categories')->insert([
            'name' => "ズボン",
        ]);
        DB::table('categories')->insert([
            'name' => "コート",
        ]);
        DB::table('categories')->insert([
            'name' => "ジャケット",
        ]);
    }
}
