@extends('layouts.app')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    
@endsection
@section('content')

<div class="card card-default">
    <div class="card-header">


 <h4>  Your  Profile  </h4>

</div>

    <div class="card-body">
        <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name:  </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" 
                value="{{
        
                  $user->name
            
                 }}">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email:  </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="email" 
                value="{{
        
                  $user->email
            
                 }}">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" >About</label>
                <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="3" >{{ isset($user) ? $profile->about :  "";}}</textarea>
              </div>



              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Facebook:  </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="facebook" 
                value="{{
        
                  $profile->facebook
            
                 }}">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Twitter:  </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="twitter" 
                value="{{
        
                  $profile->twitter
            
                 }}">
              </div>

           <img src="{{$user->getImage()}}" width="80px" height="80px" style="border-radius: 50% ; padding:10px" >
              
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="image" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload Image</label>
              </div>

              <button type="submit" class="btn btn-primary">
                 Update
            </button>
        </form>
    </div>
 
 </div>
@endsection


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection