@extends('layouts.app')

@section('title')
  Image Details
@endsection

@section('content')
  <!-- Gallery -->
<div class="row my-4">
  @include('layouts.alerts')
  <div class="col-lg-6 col-md-8 mb-4 mb-4">
      <img
        src="{{asset($photo->url)}}"
        class="w-100 h-100 shadow-1-strong rounded mb-4"
        alt="{{$photo->url}}"
      />
  </div>
  
<div class="col-lg-6">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">publisher Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$photo->user->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$photo->user->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Profile Image</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                <img
                  src="{{$photo->user->profile_image}}"
                  class="img-fluid rounded me-3"
                  width="60"
                  height="60"
                  alt="Profile Image"
                />
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Img Description</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$photo->body}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Price</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                @if(!$photo->is_free)
                <span class="badge badge-danger fw-bold">
                  $ {{$photo->price}}
                </span>
                @else
                <span class="text-info fw-bold">
                  Free
                </span>
                @endif
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
            <div class="mt-2 text-center">
            @if($photo->is_free)
                <a href="{{asset($photo->url)}}" 
                  class="btn btn-rounded btn-primary" download>
                    Download
                </a>
            @else
            @guest
                <a href="{{route('login')}}" 
                  class="btn btn-rounded btn-primary">
                    Buy Image
                </a>
            @endguest
            @auth
              @if(auth()->user()->orders->where('photo_id', $photo->id)->count())
                <a href="{{asset($photo->url)}}" 
                  class="btn btn-rounded btn-primary" download>
                    Download
                </a>
              @else
                <a href="{{route('stripe.form', $photo->id)}}" 
                  class="btn btn-rounded btn-primary">
                    Buy Image
                </a>
              @endif
            @endauth
            @endif
            </div>
            </div>
          </div>
  </div>

</div>

@endsection