<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tags::get();

        $news_id = News::all()->pluck('id');

        if(!is_null($news_id) && !is_null($tags)){
            foreach ($tags as $tag){
                for ($i=0; $i<5; $i++){
                    \DB::table('tag_news')->insert([
                        'tag_id'=>$tag->id,
                        'news_id'=>$news_id[rand(0,count($news_id)-1)]
                ]);
                }
            }
        }


    }
}
