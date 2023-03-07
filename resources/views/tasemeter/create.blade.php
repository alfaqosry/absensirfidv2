@extends('layouts.app')
@section('index_show','show')
@section('manajemen absen','active')
@section('tasemeter','active')
@section('content')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Create Tahun ajaran</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <form action="{{route('tasemeter.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-header py-3">
                                <a href="{{route('tasemeter')}}" class="btn btn-warning btn-sm"><i class="fas fa-chevron-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="tahun_ajaran">Tahun Ajaran</label>
                                        <input value="{{old('tahun_ajaran')}}" name="tahun_ajaran" type="text" class="form-control"
                                            placeholder="Input tahun ajaran" required>
                                            <br>

                                            <div class="mb-3">
                                                <label for="tglmulai" class="form-label">Tanggal Mulai</label>
                                                <input type="date" class="form-control" id="tglmulai" name="tglmulai" required >
                                                
                                              </div>
                        
                                              <div class="mb-3">
                                                <label for="tglberakhir" class="form-label">Tanggal berakhir</label>
                                                <input type="date" class="form-control" id="tglberakhir" name="tglberakhir" required >
                                              
                                              </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>

@endsection