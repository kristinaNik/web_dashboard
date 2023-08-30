<?php

use App\ButtonColor;
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
        ButtonColor::factory()->count(4)->create();


//        factory(App\Post::class, 200)->create()->each(function($post){
//            $post->save();
//        });
    }
}
