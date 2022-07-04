@extends('layouts.app')



@section('content')
@if (session()->has('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div>
@endif

  <div class="clearfix"> 
     <a href="{{route('posts.create')}}" class="btn  btn-success" style="margin-bottom: 10px; float:right;"> 
       Add Posts
    </a>
     </div>



     <div class="card" >
      <div class="card-header">
        Featured
      </div>
    
        






      <table class="table">

        
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col" style="float: right;padding-right:60px">Actions</th>
            </tr>

          </thead>
  
     
          @if ($posts->count()>0)
          
             <div class="carrd card-body">
              <tbody>
                @foreach ($posts as $post)
                <tr>
                   <td>
                    <img src="{{asset('storage/'.$post->image)}}" width="100px" height="150px" >
                 </td>
                
                  <td>{{$post->title}}</td>
          
                  <td>
                    
                    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                     <button style="float: right;margin-left:10px"class="btn btn-danger">
                      {{$post->trashed()?'Delete':'Trash'}}
                    
                    </button>
                   
                  </form>
          
          
               
                   @if (!$post->trashed())
                   
                   <a href="{{route('posts.edit',$post->id)}}">  <button type="button" style="float: right" class="btn btn-info  float-right" >Edit</button> </a>
                   @else
                   <a href="{{route('trashed.restore',$post->id)}}">  <button type="button" style="float: right" class="btn btn-info  float-right" >Restore</button> </a>
                   
                  
                 
                   @endif
          
                 
                  </td>
          
                
          
                  
                  
                </tr>
                    
                @endforeach
              </tbody>
             
               
             </div>
              
            @else
      
         <div class="card card-body">
          
          <div class="alert alert-warning" role="alert">
            You Dont Have Any Posts
          </div>
         </div>
         
                
            @endif
              
          </div>
        </table>
      
      
      










    
    
    
    
    

 
















  @endsection