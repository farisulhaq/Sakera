@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="{{ route('role.update', $kegiatanRole) }}" method="post">
              @csrf
              @method('put')
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Kode Role Kegiatan</label>
                      <div class="position-relative">
                        <input name="kode" type="text" class="form-control" placeholder="Kode Role Kegiatan"
                          id="first-name-icon" value="{{ old('kode', $kegiatanRole->kode) }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-code"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('kode')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Nama Role Kegiatan</label>
                      <div class="position-relative">
                        <input name="name" type="text" class="form-control" placeholder="Nama Role Kegiatan"
                          id="first-name-icon" value="{{ old('name', $kegiatanRole->name) }}" />
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
                    <div class="col-12 d-flex justify-content-start">
                      <button type="submit" class="btn btn-primary me-1 mb-1">
                        Edit
                      </button>
                      <a href="{{ route('role.index') }}" class="btn btn-light-secondary me-1 mb-1">
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
