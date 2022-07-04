
@extends('layouts.app')


@section('content')

  <div class="clearfix"> 
     <a href="{{route('users.create')}}" class="btn  btn-success" style="margin-bottom: 10px; float:right;"> 
       Add Users
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
              <th scope="col" style="">Permision</th>
              <th scope="col" style="">Delete Admin</th>

            </tr>

          </thead>
  
     
          @if ($users->count()>0)
          
             <div class="carrd card-body">
              <tbody>
                @foreach ($users as $user)
                <tr>
                   <td>
                     
                    <img src="{{auth()->user()->hasImage()?auth()->user()->getImageProfile():$user->getImage()}}" width="50px" height="50px" style="border-radius: 50%" >
               
                 </td>
                
                  <td>{{$user->name}}</td>
          
                  <td>
                    @if (!$user->isAdmin())

                    <form action="{{route('users.make-admin',$user->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Make Admin</button>
                    
                    </form>

                    @else
                    {{$user->role}} 

                    @endif
                  </td>
          
                   <td>
                    @if ($user->isAdmin())

                    <form action="{{route('users.delete-admin',$user->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete Admin</button>
                    
                    </form>

                    @else
                    {{-- {{$user->role}}  --}}
                    {{-- <button type="submit" class="btn btn-danger">Delete Admin</button> --}}
                      <h5> Already Admin </h5>
                    
                    @endif
                  </td>
          
                  
                  
                </tr>
                    
                @endforeach
              </tbody>
             
               
             </div>
              
            @else
      
         <div class="card card-body">
          
          <div class="alert alert-warning" role="alert">
            You Dont Have Any Users
          </div>
         </div>
         
                
            @endif
              
          </div>
        </table>
      
      
      










    
    
    
    
    

 
















  @endsection