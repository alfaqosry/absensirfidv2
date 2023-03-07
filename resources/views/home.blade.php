<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Barang</h1>
                    @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                    </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <i class="fas fa-fw fa-shopping-cart"></i> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barang as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama_barang}}</td>
                                            <td>{{$item->kategori->nama_kategori}}</td>
                                            <td>{{$item->harga_barang}}</td>
                                            <td><img src="{{Storage::url($item->foto)}}" alt=''style="width: 100px;"></td>
                                            <td>
                                                <a href="{{route('buy.barang', $item->id)}}" class="btn btn-info btn-sm"
                                                    onclick="return confirm('Barang Yang Dipilih ?')"><i class="fas fa-fw fa-shopping-cart"></i> Buy</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    
</body>
</html>