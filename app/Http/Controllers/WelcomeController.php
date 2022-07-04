<?php

namespace App\Http\Controllers;

use App\Models\Post as ModelsPost;
use Illuminate\Http\Request;
use App\Post;

class WelcomeController extends Controller
{
  public function index() {
    return view('welcome', [
      'posts' =>ModelsPost::all()
    ]);
  }
}