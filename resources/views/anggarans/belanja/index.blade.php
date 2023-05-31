@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-header">
          <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-dotted"></i>
            Tambah Kegiatan
          </a>
        </div> --}}
        <div class="card-content">
          <div class="card-body">
            <!-- Table with outer spacing -->
            <div class="table-responsive">
              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Kegiatan</th>
                    <th>Pagu</th>
                    @foreach ($bulans as $bulan)
                      <th class="text-uppercase">{{ $bulan->name }}</th>
                    @endforeach
                    <th>Show</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($kegiatans as $kegiatan)
                    <tr>
                      <td class="text-bold-500">{{ $loop->iteration }}</td>
                      <td class="text">{{ $kegiatan->kode }}</td>
                      <td class="text-capitalize">{{ $kegiatan->satuan->name }}</td>
                      <td class="text">@rupiah($kegiatan->pagu)</td>
                      @foreach ($bulans as $bulan)
                        @php
                          $count = 0;
                        @endphp
                        @foreach ($kegiatan->anggarans as $anggaran)
                          @if ($bulan->id === $anggaran->bulan_id)
                            <td class="text-center text-break">@rupiah($anggaran->biaya)</td>
                            @php
                              $count++;
                            @endphp
                          @endif
                        @endforeach
                        @if (!$count)
                          <td class="text-center">-</td>
                        @endif
                      @endforeach
                      <td class="text-center">
                        <a href="{{ route('anggarans.kerja.show', $kegiatan) }}" class="text-success"
                          style="font-size: 1.5rem">
                          <i class="bi bi-eye-fill"></i>
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="{{ route('anggarans.belanja.show', $kegiatan) }}" class="text-secondary"
                          style="font-size: 1.5rem">
                          <i class="bi bi-eye-fill"></i>
                        </a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="19" class="text-center">Data Kosong</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
