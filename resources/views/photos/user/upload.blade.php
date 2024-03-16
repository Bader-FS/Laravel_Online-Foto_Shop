@extends('layouts.app')


@section('title')
  Uplaod Photo
@endsection


@section('content')
<div class="row my-5">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header text-center fw-bold">
                Uplaod
            </div>
            <div class="card-body">
                @include('layouts.alerts')
                <form method="post" action="{{route('photos.store')}}" enctype="multipart/form-data">
                  @csrf

                  <div class="mb-4" data-mdb-input-init>
                    <label class="form-label" for="image">Photos <span class="text-danger">*</span></label>  
                    <input type="file" onchange="readImage(this, 'image_preview')"
                     id="image" name="image" class="form-control"/>
                  </div>

                  <div class="mt-2">
                    <img src="#" id="image_preview"
                     class="d-none img-fluid rounded mb-2"
                     width="100"
                     height="100">
                  </div>

                  <div class="form-outline mb-4" data-mdb-input-init>
                    <textarea rows="4" cols="" id="body" name="body" class="form-control" ></textarea>
                    <label class="form-label" for="body">Description <span class="text-danger">*</span></label>
                  </div>

                  <div class="row mb-4">
                    <div class="col d-flex justify-content-around">
                      <div class="form-check">
                        <input class="form-check-input" onchange="checkIfFree(0)"
                          type="radio" name="is_free" id="free" 
                          value="1" checked />
                        <label class="form-check-label" for="free"> Free </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" onchange="checkIfFree(1)"
                          type="radio" name="is_free" id="paid" 
                          value="0" />
                        <label class="form-check-label" for="paid"> Paid </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline d-none mb-4" id="priceField" data-mdb-input-init>
                    <input type="number" id="price" name="price" class="form-control"/>
                    <label class="form-label" for="price">Price <span class="text-danger">*</span></label>  
                  </div>

                  <button type="submit" class="btn btn-success btn-block mb-4">Upload</button>

  
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

  function readImage(input, image){
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        document.getElementById(image).classList.remove('d-none');
        document.getElementById(image).setAttribute('src',e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  };
</script>
@endsection