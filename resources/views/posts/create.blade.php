@extends('layouts.app')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    
@endsection

@section('content')
@if (session()->has('error'))
  <div class="alert alert-danger">
    {{ session()->get('error') }}
  </div>
@endif

<div class="card card-default">
    <div class="card-header">

    
    {{

      isset($post) ? "Update Post" :  "Create Post";

     }}

</div>

    <div class="card-body">
        <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
            @method('PUT')
            
            @endif
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" 
                value="{{

                  isset($post) ? $post->title :  "";
            
                 }}">
              </div>

              
              <div style="padding-bottom: 20px">
                <label  for="selectCategoryId" class="form-label">Category ID</label>
                <select  id="selectCategoryId" class="form-select" name="categoryID">
                

                  @foreach ($categories as $category)

                   <option value="{{$category->id}}">{{$category->name}} </option>

                  @endforeach
                 
                </select>
              </div>

               @if (!$tags->count()<=0 && isset($post))

               <div style="padding-bottom: 20px">
                <label  for="selectTag" class="form-label">Select a Tag</label>
                <select  id="selectTag" class="form-control
                tags" name="tags[]" multiple>
                
                     
                  @foreach ($tags as $tag)

                   <option value="{{$tag->id}}"
                  @if ($post->hasTag($tag->id))
                    
                       selected    
                    @endif
                    
                   
                    > {{$tag->name}} </option>

                  @endforeach
                 
                </select>
              </div>
                   
               @endif

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" >Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" >{{ isset($post) ? $post->description :  "";}}</textarea>
              </div>

              <div class="mb-3">
                <input id="x" type="hidden" name="content" value="{{isset($post) ? $post->content :  "";}}">
                <trix-editor input="x">
                </trix-editor>
              </div>

             
                 @if(isset($post))
                 <div class="form-gorup">
                  <img src="{{asset('storage/' . $post->image)}}" style="width: 200px ; padding-bottom: 10px;"> 
                </div> 

                 @endif
                 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="image" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload Image</label>
              </div>


              <button type="submit" class="btn btn-primary">
                 {{
                  isset($post)?"Update":"Create"
                 }}
            </button>
        </form>
    </div>
 
 </div>
@endsection


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.tags').select2();
});
</script>

@endsection