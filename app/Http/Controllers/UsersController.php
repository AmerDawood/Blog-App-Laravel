<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users',User::all());
    }

    public function create(){
        return view('users.create');
    }

    public function makeAdmin(User $user){
        $user->role ='admin';

        $user->save();
     return redirect(route('users.index'));

    }

    public function deleteAdmin(User $user){
        $user->role ='writer';
        $user->save();
     return redirect(route('users.index'));
     
    }



    public function edit(User $user ){

        $profile =$user->profile;
     
     return view('users.profile',['user'=>$user , 'profile'=>$profile]);
     
    }

    public function update(User $user ,Request $request){

        $profile =$user->profile;
        $data =$request->all();

        if($request->hasFile('image')){
         $image =$request->image->store('ProfileImage','public');
         $data['image']=$image;
        }
         $profile->update($data);
        return redirect(route('home'));
     
    }
   
}
