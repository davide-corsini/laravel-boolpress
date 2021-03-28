<?php
//{CONTROLLER ADMIN 
namespace App\Http\Controllers\Admin;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    //scelta di togliere la home
    {
        $posts = Post::all();
        $data = [
            'posts' => $posts
        ];
        return view('admin.post.index', $data);
    }
}
