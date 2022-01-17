<?php

use Illuminate\Database\Seeder;
use App\Articles;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // DB::table('articles')->insert([
        //     'title' => Str::random(10),
        //     'content' => Str::random(10).'@gmail.com',
        //     'category' => Str::random(10),
        // ]);

        $faker = Faker::create('ja_JP');

        // 100件のテストデータを繰り返し作成
        for($i = 0; $i < 100; $i++){
            Articles::create([
                'title' => $faker->name,
                'content' => $faker->realText(24),
                'category' => $faker->numberBetween(1,5)
            ]);
        }

        factory(Articles::class, 10)->create();
    }
}
