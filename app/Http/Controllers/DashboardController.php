<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index',[
            'posts_count'=>Post::all()->count(),
            'users_count'=>User::all()->count(),
            'categories_count'=>Category::all()->count(),
            'tags_count'=>Tag::all()->count(),


        ]);
    }
}
