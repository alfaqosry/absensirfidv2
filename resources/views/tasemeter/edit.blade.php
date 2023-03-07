@extends('layouts.app')
@section('index_show','show')
@section('manajemen absen','active')
@section('kategori','active')
@section('content')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Kategori</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <form action="{{route('kategori.update', $kategori->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="card-header py-3">
                                <a href="{{route('kategori')}}" class="btn btn-warning btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="nama_kategori">Nama Kategori</label>
                                        <input value="{{$kategori->nama_kategori}}" name="nama_kategori" type="text" class="form-control"
                                            placeholder="" required>
                                            <br>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>

@endsection