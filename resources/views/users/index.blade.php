@extends('template.app')
@section('content')
  <x-header :title="$title" />
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-dotted"></i>
            Tambah User
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
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Seksi/Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @forelse ($users as $user)
                    <tr>
                      <td class="text-bold-500">{{ $loop->iteration }}</td>
                      <td class="text">{{ $user->name }}</td>
                      <td class="text">{{ $user->email }}</td>
                      <td>{{ $user->roles[0]->name }}</td>
                      <td class="text-bold-500">
                        <a href="{{ route('users.edit', $user) }}" class="text-primary" style="font-size: 1.5rem">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        @if (!($user->roles[0]->name === 'admin'))
                          <a href="#" class="text-danger showConfirm" style="font-size: 1.5rem">
                            <i class="bi bi-trash-fill"></i>
                          </a>
                        @endif
                        <form action="{{ route('users.destroy', $user) }}" method="post">
                          @csrf
                          @method('delete')
                        </form>
                      </td>

                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center">Data Kosong</td>
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
