@extends('layouts.app')


@section('content')
@if (session()->has('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div>
@endif

  @if (session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
  @endif

  <div class="clearfix"> 
     <a href="{{route('categories.create')}}" class="btn btn-success" style="margin-bottom: 10px; float:right;"> 
       Add Category
    </a>
     </div>
<div class="card card-default">

<table class="table">
    <thead>
        <tr>
          <th scope="col"><h3> All Categories </h3></th>
         
        </tr>
      </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
      
        <td>{{$category->name}}</td>

        <td>

          <form action="{{route('categories.destroy',$category->id)}}" method="POST">
            @csrf
            @method('DELETE')
           <button style="float: right;margin-left:10px"class="btn btn-danger">Delete</button>
         
        </form>
            
           <a href="{{route('categories.edit',$category->id)}}">  <button type="button" style="float: right" class="btn btn-info  float-right" >Edit</button> </a>
 
        </td>  
      </tr>
          
      @endforeach
    </tbody>
  </table>
@endsection