<?php

use Illuminate\Database\Seeder;

class ButtonColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ButtonColor::class, 4)->create();

//        factory(App\Post::class, 200)->create()->each(function($post){
//            $post->save();
//        });
    }
}
