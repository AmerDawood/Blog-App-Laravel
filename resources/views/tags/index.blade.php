@extends('layouts.app')


@section('content')

    @if (session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif


  <div class="clearfix"> 
     <a href="{{route('tags.create')}}" class="btn btn-success" style="margin-bottom: 10px; float:right;"> 
       Add Tags
    </a>
     </div>
<div class="card card-default">


<table class="table">
    <thead>
        <tr>
          <th scope="col"><h3> All Tags </h3></th>
         
        </tr>
      </thead>
    <tbody>
      @foreach ($tags as $tag)
      <tr>
      
        <td>{{$tag->name}}  {{$tag->posts->count()}}</td>

        <td>

          <form action="{{route('tags.destroy',$tag->id)}}" method="POST">
            @csrf
            @method('DELETE')
           <button style="float: right;margin-left:10px"class="btn btn-danger">Delete</button>
         
        </form>
            
           <a href="{{route('tags.edit',$tag->id)}}">  <button type="button" style="float: right" class="btn btn-info  float-right" >Edit</button> </a>
     
      
         

     
        </td>

      

        
        
      </tr>
          
      @endforeach
    </tbody>
  </table>
@endsection