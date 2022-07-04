@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
               
                <div class="row" style="padding: 50px">
                   
                      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Users</div>
                        <div class="card-body">
                          <h5 class="card-title">{{$users_count}}</h5>
                        </div>
                      </div>
                      
                      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">Posts</div>
                        <div class="card-body">
                          <h5 class="card-title">{{$posts_count}}</h5>
                        </div>
                      </div>
                      <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">Tags</div>
                        <div class="card-body">
                          <h5 class="card-title">{{$tags_count}}</h5>
                        </div>
                      </div>
                      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                          <h5 class="card-title">{{$categories_count}}</h5>
                        </div>
                      </div>
                    
                     
                
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
