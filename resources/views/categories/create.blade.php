@extends('layouts.app')


@section('content')

<div class="card card-default">
    <div class="card-header">

    {{

      isset($category) ? "Update Category" :  "Create Category";

     }}

</div>

   
    <div class="card-body">
        <form action="{{isset($category)?route('categories.update',$category->id) :route('categories.store')}}" method="POST">
            @csrf
            @if (isset($category))
            @method('PUT')
            @endif
            <div class="mb-3">
              <label class="form-label">Category Name</label>
              <input type="text" class="form-control" name="name" class="@error('name')is-invalid @enderror "
              
               value="{{

                isset($category) ? $category->name :  "";
          
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

                    isset($category) ? "Update" :  "Create";
              
                   }}
            </button>
          </form>
    </div>
 
 </div>
@endsection