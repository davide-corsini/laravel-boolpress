<?php
//{CONTROLLER ADMIN 
namespace App\Http\Controllers\Admin;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Str;



use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    //scelta di togliere la home
    {
        $posts = Post::all();
        $tags = Tag::all();
        $data = [
            'posts' => $posts,
            'tags' => $tags

        ];
        return view('admin.post.index', $data);
    }


    public function profile(){
        return view('admin.user.profile');
    }


    public function generaToken(){
        

        $api_token = Str::random(40);
        //Seleziono l'utente a cui assegnare il token       
        $user = Auth::user();
        $user->api_token = $api_token; 
        //adesso lo salvo
        $user->save();

        return redirect()->route('profile');
    }
}
