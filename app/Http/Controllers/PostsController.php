<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{



   

    public function __construct()
    {
        $this->middleware('checkCategory')->only('create');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }


   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {

 
      $post=  Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$request->image->store('images','public'),
            'category_id'=>$request->categoryID,
            'user_id'=>$request->user_id

        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);

        }
        session()->flash('success', 'Post created successfully');

        return redirect(route('posts.index'));

        // dd($request->image->store('images','public'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $user = $post->user;
      $profile = $user->profile; 
      return view("posts.show")->with('post',$post)->with('categories',Category::all())->with('profile',$profile)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create',['post'=>$post, 'categories'=>Category::all(),'tags'=>Tag::all(),]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request , Post $post)

    {
        $data = $request->only(['title','description','content']);

        if($request->hasFile('image')){
          $image=  $request->image->store('images','public');
          Storage::disk('public')->delete($post->image);
          $data['image'] = $image;

        }

        if($request->tags){

            $post->tags()->sync($request->tags);

        }

        $post->update($data);
        session()->flash('success', 'Post updated successfully');

       return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $post = Post::withTrashed()->where('id',$id)->first();
       if($post->trashed()){
        Storage::disk('public')->delete($post->image);
          $post->forceDelete();
       }else{
        $post->delete();
       }
       session()->flash('success', 'Post deleted successfully');

       return redirect(route('posts.index'));
        

    }


    public function trashed(){
        $trashed =Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$trashed);


    }

    public function restore($id){
        Post::withTrashed()
        ->where('id',$id)
        ->restore();

        return view(route('posts.index'));
    }
}