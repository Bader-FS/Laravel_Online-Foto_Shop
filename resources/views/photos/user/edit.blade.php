@extends('layouts.app')


@section('title')
  Edit Photo Details
@endsection


@section('content')
<div class="row my-5">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header text-center fw-bold">
                Edit Photo
            </div>
            <div class="card-body">
                @include('layouts.alerts')
                <form method="POST" action="{{route('photos.update',$photo->id)}}">
                  @csrf
                  @method('PUT')
                  <div class="form-outline mb-4" data-mdb-input-init>
                    <textarea rows="4" cols="" id="body" name="body" class="form-control">{{$photo->body}}</textarea>
                    <label class="form-label" for="body">Description <span class="text-danger">*</span></label>
                  </div> 

                  <div class="row mb-4">
                    <div class="col d-flex justify-content-around">
                      <div class="form-check">
                        <input class="form-check-input" onchange="checkIfFree(0)"
                          type="radio" name="is_free" id="free" 
                          value="1" @checked($photo->is_free) />
                        <label class="form-check-label" for="free"> Free </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" onchange="checkIfFree(1)"
                          type="radio" name="is_free" id="paid" 
                          value="0" @checked(!$photo->is_free) />
                        <label class="form-check-label" for="paid"> Paid </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline {{$photo->is_free ? 'd-none' : ''}} mb-4" id="priceField" data-mdb-input-init>
                    <input type="number" id="price" name="price" value="{{$photo->price}}" class="form-control"/>
                    <label class="form-label" for="price">Price <span class="text-danger">*</span></label>  
                  </div>

                  <button type="submit" class="btn btn-success btn-block mb-4">Update</button>

  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  function checkIfFree(value){
    if(value == 1){
      document.getElementById('priceField').classList.remove('d-none');
    }
    else{
      document.getElementById('priceField').classList.add('d-none');
    }
  };
</script>
@endsection