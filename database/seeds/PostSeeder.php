<?php

use Illuminate\Database\Seeder;
//uso il model Post
use App\Post;

//uso il model User
use App\User;

// per usare faker
use Faker\Generator as Faker;

//per usare slug
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->sentence(4);
            $newPost->content = $faker->text(500);
            $slug = Str::slug('titolo-numero'); //in teoria ci andrebbe messo il title
            $postPresente = Post::where('slug', $slug)->first();
            $slugIniziale = $slug;
            $contatore = 1;
            while ($postPresente) {
                $slug = $slugIniziale . '-' . $contatore;
                $postPresente = Post::where('slug', $slug)->first();
                $contatore++;
            }

            $newPost->slug = $slug;
            
            //Aggiunto proprietá nuova ('user_id')
            $conteggioUser = Count(User::all()->toArray());
            $newPost->user_id = rand(1, $conteggioUser);


            // $newPost->slug = Str::slug($newPost->title);
            $newPost->save();

        }
    }
}
