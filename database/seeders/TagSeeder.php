<?php

namespace Database\Seeders;

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
            '#Отношения',
            "#Политика",
            "#Катар2022",
            "#Экономика",
            "#Спорт",
            "#Футбол",
            "#ПроблемыэЭкологии",
            "#Производительность",
            "#жизнь2022",
            "#JamesWeb",
            "#МанЮнайтедРоналдо",
            "#Общество",
            "#Култура",
            "#Релегия",
            "#Туризм",
            "#Вмире",
            "#Бизнес",
            "#Безопасность",
            "#Дети",
            "#Образование",
            );


        foreach ($tags_name as $tag){
            \DB::table('tags')->insert([
               'tag_name'=>$tag
            ]);
        }




    }
}
