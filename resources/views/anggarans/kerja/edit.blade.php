@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="{{ route('anggarans.kerja.update', $anggaran) }}" method="post">
              @csrf
              @method('put')
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Ket</label>
                      <div class="position-relative">
                        <input name="name" type="text" class="form-control" placeholder="Ket" id="first-name-icon"
                          value="{{ old('name', $anggaran->name) }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-award-fill"></i>
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
                      <label for="first-name-icon">Anggaran</label>
                      <div class="position-relative">
                        <input name="biaya" type="text" class="form-control" placeholder="Anggaran"
                          id="first-name-icon" value="{{ old('biaya', $anggaran->biaya) }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-coin"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('biaya')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Tanggal</label>
                      <div class="position-relative">
                        <input name="tanggal" type="date" class="form-control" id="first-name-icon"
                          value="{{ old('tanggal', \Carbon\Carbon::parse($anggaran->tanggal)->format('Y-m-d')) }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-calendar"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('tanggal')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-12 d-flex justify-content-start">
                      <button type="submit" class="btn btn-primary me-1 mb-1">
                        Edit
                      </button>
                      <a href="{{ url()->previous() }} }}" class="btn btn-light-secondary me-1 mb-1">
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
