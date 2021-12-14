<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\BLog;
use Faker\Factory as Faker;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $value){
            DB::table('blogs')->insert([
                'user_id' => '1',
                'category_id' => '1',
                'title' =>$faker->title(),
                'image' => 'resources\outsite\assert\img\sodo1.jpg',
                'sumary' => $faker->text(),
                'content' => $faker->text(),
                'status' => Blog::BLOG_PUBLIC,


            ]);
        }
    }
}
