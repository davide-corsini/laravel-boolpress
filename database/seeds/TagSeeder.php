<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\User;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
            for ($i=0; $i < 10; $i++) { 
                $newPost = new Tag();
                $newPost->name = $faker->sentence(1);
                $slug = Str::slug($newPost->name); //in teoria ci andrebbe messo il title
                
                //se postPresente risulterá NULL allora non entro nel ciclo while
                $postPresente = Post::where('slug', $slug)->first();
                
                //Slug Iniziale mi serve per evitare ripetizioni di numero
                $slugIniziale = $slug;
                //variabile contatore
                $contatore = 1;
                //Se postPresente é vero
                while ($postPresente) {
                    //allora slug aggiungi 1
                    $slug = $slugIniziale . '-' . $contatore;
                    $postPresente = Post::where('slug', $slug)->first();
                    $contatore++;
                }

                $newPost->slug = $slug;
                
                //Aggiunto proprietá nuova ('user_id')
                


                // $newPost->slug = Str::slug($newPost->title);
                $newPost->save();

                //  $newPost->tags()->sync($data['tags']);
                //nel caso l'utente non check nulla effettuo controllo
                if(array_key_exists('tags', $data)){
                    $newPost->tags()->sync($data['tags']);

                }
        }
    }
}