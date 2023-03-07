@extends('layouts.app')
@section('user', 'active')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pegawai</h1>
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    @if (session('gagal'))
        <div class="alert alert-warning" role="alert">
            {{ session('gagal') }}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('pengguna.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Pegawai</a>
         
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>RFID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->rfid }}</td>
                                <td>
                                    <a href="{{ route('pengguna.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <a href="{{ route('pengguna.delete', $item->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus Data ?')"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
