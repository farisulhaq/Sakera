@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="{{ route('users.update', $user) }}" method="post">
              @csrf
              @method('put')
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Password</label>
                      <div class="position-relative">
                        <input name="password" type="password" class="form-control" id="first-name-icon" />
                        <div class="form-control-icon">
                          <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                          <div class="text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Password Confirmasi</label>
                      <div class="position-relative">
                        <input name="password_confirmation" type="password" class="form-control" id="first-name-icon" />
                        <div class="form-control-icon">
                          <i class="bi bi-shield-lock"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-start">
                      <button type="submit" class="btn btn-primary me-1 mb-1">
                        Edit
                      </button>
                      <a href="{{ route('users.index') }}" class="btn btn-light-secondary me-1 mb-1">
                        Kembali
                      </a>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
