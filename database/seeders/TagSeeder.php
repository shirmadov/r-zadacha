<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\TagNews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tags;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags_name = array(
            '#Technology',
            "#Politics",
            "#Qatar2022",
            "#Economy",
            "#Sport",
            "#Football",
            "#EcologyProblem",
            "#Productivity",
            "#life2022",
            "#JamesWeb",
            "#ManUnitedRonaldo",
            "#Formula1",
            "#Calture",
            "#religion",
            "#Tourist",
            "#theworld",
            "#business",
            "#security",
            "#children",
            "#education",
            );


        foreach ($tags_name as $tag){
            \DB::table('tags')->insert([
               'tag_name'=>$tag
            ]);
        }

        News::factory(20)->create();

    }
}
