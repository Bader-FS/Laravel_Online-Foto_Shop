@extends('layouts.app')


@section('title')
  Profile
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-4">
            
        <div class="card my-4">
          <div class="card-body text-center">
            <img src="{{auth()->user()->profile_image}}" alt=""
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{auth()->user()->name}}</h5>
            <p class="text-muted">{{auth()->user()->email}}</p>
          </div>
        </div>
        <div class="card my-4">
          <div class="card-body text-center">
          @include('layouts.alerts')
            <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-2">
                    <label class="form-label" for="image">Update Profile Image</label>  
                    <input type="file"
                     id="image" name="image"
                     class="form-control"
                    />
                </div>
                <button type="submit" class="btn btn-info btn-rounded btn-lg mb-4">Upload</button>
            </form>
          </div>
        </div>
        </div>
        <div class="col-md-7">
            <table class="table align-middle mb-0 bg-white caption-top">
                <caption>My Photos</caption>
                <thead class="bg-light">
                    <tr>
                        <th>Photo</th>
                        <th>Price</th>
                        <th>Added</th>
                        <th>Sales Rate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(auth()->user()->photos as $photo)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{asset($photo->url)}}" 
                                width="45"
                                height="45" 
                                class="rounded-circle"
                                alt="" srcset="">
                            </div>
                        </td>
                        <td>
                            @if($photo->is_free)
                            <span class="badge badge-primary rounded-pill d-inline">
                                Free
                            </span>
                            @else
                            <span class="badge badge-danger rounded-pill d-inline">
                                ${{$photo->price}}
                            </span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-success rounded-pill d-inline">
                                {{$photo->created_at->diffForHumans()}} 
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-info">
                              {{$photo->orders->count()}} <i class="fa fa-cart-plus" ></i>
                            </span>
                        </td>
                        <td>
                            <a href="{{route('photos.edit',$photo->id)}}"
                             class="btn btn-warning btn-sm btn-rounded">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>  
                    @empty

                    <tr>
                        <td class="cell" collspan="4"><div class="fw-bold text-center text-info">
                            You Have not inserted Any Photo Yet
                        </div></td>
    
                    </tr>
                    @endforelse
                </tbody>
            </table>
           
            
            <table class="table align-middle mb-0 bg-white caption-top">
                <caption>My Orders</caption>
                <thead class="bg-light">
                    <tr>
                        <th>Photo</th>
                        <th>publisher</th>
                        <th>Purchased</th>
                        <th>Downolad</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(auth()->user()->orders as $order)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{asset($order->photo->url)}}" 
                                width="45"
                                height="45" 
                                class="rounded-circle"
                                alt="" srcset="">
                            </div>
                        </td>
                        <td>
                            <span class="fw-bold text-center">{{$order->photo->user->name}}</span>
                        </td>
                        <td>
                            <span class="badge badge-success rounded-pill d-inline">
                                {{$order->created_at->diffForHumans()}} 
                            </span>
                        </td>
                        <td>
                            <a href="{{asset($order->photo->url)}}"
                             class="btn btn-info btn-rounded" download>
                               Download
                            </a>
                        </td>
                    </tr>
                    @empty

                    <tr>
                        <td class="cell" collspan="3"><div class="fw-bold text-center text-info">
                            (0) Order(s)
                        </div></td>
    
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection