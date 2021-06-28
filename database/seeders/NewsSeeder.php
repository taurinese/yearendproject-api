<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                "title" => Str::random(10),
                "body" => Str::random(120),
                "active" => true,
                "url_image" => 'http://res.cloudinary.com/hyi9bajzn/image/upload/v1624864188/posts/posts_60d975bc16914.jpg',
                "cloudinary_id" => 'posts/posts_60d975bc16914',
                "user_id" => 1,
                "published_at" => "2021-06-27"
            ]);
        }
    }
}
