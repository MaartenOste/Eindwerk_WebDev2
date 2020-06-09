<?php

use App\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faker library instantiëren, om te gebruiken
        $faker = Faker\Factory::create();

        // nieuwe instantie van Room-model
        $news = new News();

        // willekeurig nummer en naam
        $news->en_title = $faker->realText(30);
        $news->en_intro = $faker->realText(150);
        $news->en_content = $faker->realText(2000);
        $news->nl_title = $faker->sentence();
        $news->nl_intro = $faker->paragraph(4);
        $news->nl_content = $faker->paragraph(20);
        $news->image = $faker->image('public/storage/uploads', 640,480, null, false);
        $news->visible = true;

        // bewaren
        $news->save();
    }
}
