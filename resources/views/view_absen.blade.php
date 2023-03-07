@extends('layouts.app')
@section('index_show','show')
@section('index','active')
@section('absensaya','active')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $tasemeter->tahun_ajaran}}</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    <tr>
                        <th>Nama</th>
                        @foreach ($jadwal as $j )
                        <td>{{ $j->tanggal."/".$j->bulan }}</td>
                        @endforeach

                    </tr>
                </thead>
                <tbody>
                  
                    <tr>
                        {{-- <td>{{$loop->iteration}}</td> --}}

                        <th>{{$user->name}}</th>
                        @foreach ($jadwal as $j )
                        @php

                        $dataabsen = App\Models\Dataabsen::select('*')
                        ->where('jadwal_id', '=', $j->id)
                        ->where('user_id', '=', $user->id)
                        ->first();

                        @endphp
                        {{-- @dd($dataabsen) --}}

                        <td @if ($j->hari == "Sunday")
                            class="bg-danger"
                            @elseif (isset($dataabsen->status) && $dataabsen->status == "Hadir" )
                            class="bg-success"
                            @elseif ( isset($dataabsen->status) && $dataabsen->status == "Terlambat" )
                            class="bg-warning"

                            @endif >
                            
                            @if ($dataabsen)

                            @if ($dataabsen->status == "Hadir" )
                            <center>H</center>

                            @elseif ($dataabsen->status == "Terlambat" )
                            <center>T</center>
                            @endif

                            @endif</td>
                        @endforeach





















                        {{-- <td>
                            <a href="{{route('tasemeter.edit', $item->id)}}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <a href="{{route('tasemeter.delete', $item->id)}}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus Data ?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td> --}}
                    </tr>
               
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection