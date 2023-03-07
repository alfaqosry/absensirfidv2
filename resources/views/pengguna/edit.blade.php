@extends('layouts.app')
@section('user', 'active')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah User</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form action="{{Route('pengguna.update', $user->id)}}" method="post">
        {{ csrf_field() }}
        <div class="card-header py-3">
            <a href="{{route('pengguna.index')}}" class="btn btn-warning btn-sm"><i class="fas fa-chevron-left"></i>
                Kembali</a>
            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
        </div>
        <div class="card-body">
            <div class="row">




                <div class="form-group col-md-6">
                    <label for="name">Nama</label>
                    <input name="name" type="text" class="form-control" id="name" required value="{{ $user->name }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email" required value="{{ $user->email }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="form-control">
                        <option value="{{$user->role}}">@if ($user->role == "User")
                            Pegawai
                            @elseif ($user->role == "Admin")
                            Admin
                            
                        @endif</option>
                        <option value="Admin">Admin</option>
                        <option value="User">Pegawai</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="jabatan">Jabatan</label>
                    <input name="jabatan" type="text" class="form-control" id="jabatan" required
                        value="{{ $user->jabatan }}">
                </div>


                <div class="form-group col-md-6">
                    <label for="rfid">RFID</label>
                    <input name="rfid" type="text" class="form-control" id="jabatan" required value="{{ $user->rfid }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" >
                </div>



            </div>
        </div>

</form>

</div>

@endsection