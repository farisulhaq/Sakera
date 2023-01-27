@extends('template.guest')
@section('content')
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <h1 class="auth-title">
            SAKERA
          </h1>
          <h6 class="auth-title">Log in.</h6>
          <form action="{{ route('postLogin') }}" method="post">
            @csrf
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="form-group position-relative has-icon-left mb-4">
              <input name="email" type="text" class="form-control form-control-xl" placeholder="Email" />
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
              {{-- error --}}
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input name="password" type="password" class="form-control form-control-xl" placeholder="Password" />
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <div class="form-check form-check-lg d-flex align-items-end">
              <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
              <label class="form-check-label text-gray-600" for="flexCheckDefault">
                Keep me logged in
              </label>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
              Log in
            </button>
          </form>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
      </div>
    </div>
  </div>
@endsection
