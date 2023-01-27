@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="{{ route('kegiatan.update', $kegiatan) }}" method="post">
              @csrf
              @method('put')
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Kode Kegiatan</label>
                      <div class="position-relative">
                        <input name="kode" type="text" class="form-control" placeholder="Kode Kegiatan"
                          id="first-name-icon" value="{{ old('kode', $kegiatan->kode) }}" />
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
                      <label for="first-name-icon">Nama Kegiatan</label>
                      <div class="position-relative">
                        <input name="name" type="text" class="form-control" placeholder="Nama Kegiatan"
                          id="first-name-icon" value="{{ old('name', $kegiatan->name) }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-activity"></i>
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
                      <label for="first-name-icon">Jenis Kegiatan</label>
                      <select class="choices form-select" name="kegiatan_role_id">
                        @foreach ($kegiatanRole as $role)
                          <option
                            {{ old('kegiatan_role_id', $kegiatan->kegiatan_role_id) == $role->id ? 'selected' : '' }}
                            value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                      </select>
                      {{-- error --}}
                      @error('kegiatan_role_id')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Target</label>
                      <div class="position-relative">
                        <input name="target" type="text" class="form-control" placeholder="Target"
                          id="first-name-icon" value="{{ old('target', $kegiatan->target) }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-bullseye"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('target')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Satuan</label>
                      <select class="choices form-select" name="satuan_id">
                        @foreach ($satuans as $satuan)
                          <option {{ old('satuan_id', $kegiatan->satuan_id) == $satuan->id ? 'selected' : '' }}
                            value="{{ $satuan->id }}">
                            {{ $satuan->name }}</option>
                        @endforeach
                      </select>
                      {{-- error --}}
                      @error('satuan_id')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Pagu</label>
                      <div class="position-relative">
                        <input name="pagu" type="text" class="form-control" placeholder="Pagu" id="first-name-icon"
                          value="{{ old('pagu', $kegiatan->pagu) }}" />
                        <div class="form-control-icon">
                          <i class="bi bi-coin"></i>
                        </div>
                      </div>
                      {{-- error --}}
                      @error('pagu')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Tahun</label>
                      <select class="choices form-select" name="tahun">
                        @foreach ($years as $year)
                          <option {{ old('tahun', $kegiatan->tahun) == $year ? 'selected' : '' }}
                            value="{{ $year }}">
                            {{ $year }}</option>
                        @endforeach
                      </select>
                      {{-- error --}}
                      @error('tahun')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group has-icon-left">
                      <label for="first-name-icon">Seksi</label>
                      <select class="choices form-select" name="role_id">
                        @foreach ($seksis as $seksi)
                          <option {{ old('role_id', $kegiatan->role_id) == $seksi->id ? 'selected' : '' }}
                            value="{{ $seksi->id }}">
                            {{ $seksi->name }}</option>
                        @endforeach
                      </select>
                      {{-- error --}}
                      @error('role_id')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-12 d-flex justify-content-start">
                      <button type="submit" class="btn btn-primary me-1 mb-1">
                        Edit
                      </button>
                      <a href="{{ route('kegiatan.index') }}" class="btn btn-light-secondary me-1 mb-1">
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
