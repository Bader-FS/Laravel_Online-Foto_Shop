@extends('layouts.app')


@section('title')
  Register
@endsection

@section('content')
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Register Page</h2>
            @include('layouts.alerts')
            <form method="post" action="{{route('register')}}">
            @csrf

            <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="text" id="name" name="name" class="form-control" />
                  <label class="form-label" for="name">First name</label>
            </div>
  

            <div class="form-outline mb-4" data-mdb-input-init>
              <input type="email" id="email" name="email" class="form-control" autocomplete="off" />
              <label class="form-label" for="email">Email address</label>
            </div>

            <div class="form-outline mb-4" data-mdb-input-init>
              <input type="password" id="password" name="password" class="form-control" />
              <label class="form-label" for="password">Password</label>
            </div>

            <div class="form-outline mb-4" data-mdb-input-init>
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
              <label class="form-label" for="password_confirmation">Password Confirmation</label>
            </div>


            <div class="text-center">
              <button type="submit" class="btn btn-info btn-lg btn-rounded mb-4 waves-effect">Sign up</button>
            </div>



          


            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://phototrend.fr/wp-content/uploads/2024/03/phototrend_leica_sl3_packshot_1-390x390.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
</section>
@endsection