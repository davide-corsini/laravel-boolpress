<?php
//{CONTROLLER ADMIN 
namespace App\Http\Controllers\Admin;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

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
}
