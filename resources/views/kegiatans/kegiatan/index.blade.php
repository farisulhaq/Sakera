@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-dotted"></i>
            Tambah Kegiatan
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
                    <th>Kode</th>
                    <th>Kegiatan</th>
                    <th>Target</th>
                    <th>Satuan</th>
                    <th>Pagu</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($kegiatans as $kegiatan)
                    <tr>
                      <td class="text-bold-500">{{ $loop->iteration }}</td>
                      <td class="text">{{ $kegiatan->kode }}</td>
                      <td class="text">{{ $kegiatan->name }}</td>
                      <td class="text">{{ $kegiatan->target }}</td>
                      <td class="text-capitalize">{{ $kegiatan->satuan->name }}</td>
                      <td class="text">@rupiah($kegiatan->pagu)</td>
                      <td class="text-bold-500">
                        <a href="{{ route('kegiatan.edit', $kegiatan) }}" class="text-primary" style="font-size: 1.5rem">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="" class="text-danger showConfirm" style="font-size: 1.5rem">
                          <i class="bi bi-trash-fill"></i>
                        </a>
                        <form action="{{ route('kegiatan.destroy', $kegiatan) }}" method="post">
                          @csrf
                          @method('delete')
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center">Data Kosong</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5" class="text-center">Total</th>
                    <th colspan="2"> @rupiah($sumPagu) </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
