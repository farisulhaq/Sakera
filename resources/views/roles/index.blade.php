@extends('template.app')
@section('content')
  {{-- <div class="page-heading"> --}}
  <x-header :title="$title" />
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('roles.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-dotted"></i>
            Tambah Seksi
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
                    <th>Nama Seksi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($roles as $role)
                    <tr>
                      <td class="text-bold-500">{{ $loop->iteration }}</td>
                      <td class="text-uppercase">{{ $role->name }}</td>
                      <td class="text-bold-500">
                        <a href="{{ route('roles.edit', $role) }}" class="text-primary" style="font-size: 1.5rem">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#" class="text-danger showConfirm" style="font-size: 1.5rem">
                          <i class="bi bi-trash-fill"></i>
                        </a>
                        <form action="{{ route('roles.destroy', $role) }}" method="post">
                          @csrf
                          @method('delete')
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3" class="text-center">Data Kosong</td>
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
  {{-- </div> --}}
@endsection
{{-- @section('script')
  <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
  <script src="assets/js/pages/datatables.js"></script>
@endsection --}}
