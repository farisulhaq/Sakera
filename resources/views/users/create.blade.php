@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="{{ route('users.store') }}" method="post">
              @csrf
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Nama User</label>
                      <div class="position-relative">
                        <input name="name" type="text" class="form-control" placeholder="Nama User"
                          id="first-name-icon" value="{{ old('name') }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-person"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('name')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Email User</label>
                      <div class="position-relative">
                        <input name="email" type="text" class="form-control" placeholder="Email User"
                          id="first-name-icon" value="{{ old('email') }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-envelope"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('email')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Seksi</label>
                      <select class="choices form-select" name="role_id">
                        @foreach ($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                      </select>
                      {{-- error --}}
                      @error('role_id')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Password</label>
                      <div class="position-relative">
                        <input name="password" type="password" class="form-control" id="first-name-icon" />
                        <div class="form-control-icon">
                          <i class="bi bi-shield-lock"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('password')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Password Confirmasi</label>
                      <div class="position-relative">
                        <input name="password_confirmation" type="password" class="form-control" id="first-name-icon" />
                        <div class="form-control-icon">
                          <i class="bi bi-shield-lock"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('password_confirmation')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-12 d-flex justify-content-start">
                      <button type="submit" class="btn btn-primary me-1 mb-1">
                        Tambah
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
