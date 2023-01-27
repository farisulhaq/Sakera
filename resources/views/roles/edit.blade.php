@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="{{ route('roles.update', $role) }}" method="post">
              @csrf
              @method('put')
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Nama Seksi</label>
                      <div class="position-relative">
                        <input name="name" type="text" class="form-control" placeholder="Nama Seksi"
                          id="first-name-icon" value="{{ old('name', $role->name) }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-person"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                      Update
                    </button>
                    <a href="{{ route('roles.index') }}" class="btn btn-light-secondary me-1 mb-1">
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
