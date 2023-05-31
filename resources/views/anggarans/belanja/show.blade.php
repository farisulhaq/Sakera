@extends('template.app')
@section('content')
  <x-header :title="$title" />
  {{-- {{ dd($kegiatan) }} --}}
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('anggarans.belanja.create', $kegiatan) }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-dotted"></i>
            Tambah Rencana Belanja
          </a>
        </div>
        <div class="card-content">
          <div class="card-body">
            <!-- Table with outer spacing -->
            <div class="table-responsive">
              <table class="table" id="table1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ket</th>
                    <th>Anggaran</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($kegiatan->anggarans as $anggarans)
                    @foreach ($anggarans->anggaranDetails as $anggaran)
                      <tr>
                        <td class="text-bold-500">{{ $loop->iteration }}</td>
                        <td class="text">{{ $anggaran->name }}</td>
                        <td class="text">@rupiah($anggaran->biaya)</td>
                        <td class="text-capitalize">{{ $anggaran->tanggal }}</td>
                        <td class="text-bold-500">
                          <a href="{{ route('anggarans.belanja.edit', $anggaran) }}" class="text-primary"
                            style="font-size: 1.5rem">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <a href="" class="text-danger showConfirm" style="font-size: 1.5rem">
                            <i class="bi bi-trash-fill"></i>
                          </a>
                          <form action="{{ route('anggarans.belanja.destroy', $anggaran) }}" method="post">
                            @csrf
                            @method('delete')
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @empty
                    <tr>
                      <td colspan="5" class="text-center">Data Kosong</td>
                    </tr>
                  @endforelse
                </tbody>
                {{-- <tfoot>
									<tr>
                    <th colspan="5" class="text-center">Total</th>
                    <th colspan="2">{{ 'Rp. ' . number_format($sumPagu, 0, ',', '.') }}</th>
                  </tr>
                </tfoot> --}}
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
