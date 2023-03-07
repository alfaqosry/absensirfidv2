@extends('layouts.app')
@section('index_show', 'show')
@section('index', 'active')
@section('jadwal', 'active')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="{{ route('jadwal.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-header py-3">
                <a href="{{ route('jadwal.create') }}" class="btn btn-warning btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="tglmulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tglmulai" >
                        
                      </div>

                      <div class="mb-3">
                        <label for="tglberakhir" class="form-label">Tanggal berakhir</label>
                        <input type="date" class="form-control" id="tglberakhir" >
                      
                      </div>

                      
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
