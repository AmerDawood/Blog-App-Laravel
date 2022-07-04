@extends('layouts.app')


@section('content')

<div class="card card-default">
    <div class="card-header">

    {{

      isset($category) ? "Update Tag" :  "Create Tag";

     }}

</div>

   
    <div class="card-body">
        <form action="{{isset($tag)?route('tags.update',$tag->id) :route('tags.store')}}" method="POST">
            @csrf
            @if (isset($category))
            @method('PUT')
            @endif
            <div class="mb-3">
              <label class="form-label">Tag Name</label>
              <input type="text" class="form-control" name="name" class="@error('name')is-invalid @enderror "
              
               value="{{

                isset($tag) ? $tag->name :  "";
          
               }}"
              >
            </div>

            @error('name')
             <div class="alert alert-danger">
                {{$message}}
             </div>
            
            @enderror
          
            <button type="submit" class="btn btn-primary">

                {{

                    isset($tag) ? "Update" :  "Create";
              
                   }}
            </button>
          </form>
    </div>
 
 </div>
@endsection