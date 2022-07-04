<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable =[
     'user_id','about' ,'image' ,'twitter','facebook'
    ];


    public function profile(){
        return $this->belongsTo(User::class);
       }
}
