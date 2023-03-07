<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Dataabsen;
use App\Models\Tasemeter;
use Illuminate\Http\Request;

class TasemeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            $tasemeter = Tasemeter::all();
    
            return view('tasemeter.index', compact('tasemeter'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasemeter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            
        ]);
        $tasemeter = [
            'tahun_ajaran' =>  $request->tahun_ajaran
        ];
       
        $gas = Tasemeter::create($tasemeter);

// Menghitung hari

$tgl1 = new DateTime($request->tglmulai);
$tgl2 = new DateTime($request->tglberakhir);
$jarak = $tgl2->diff($tgl1);





for ($i=0; $i < $jarak->days ; $i++) { 

  
				$hari = date('l', strtotime('+' . $i . ' day', strtotime($request->tglmulai)));
				$tgl = date('d', strtotime('+' . $i . ' day', strtotime($request->tglmulai)));
				$bulan = date('m', strtotime('+' . $i . ' day', strtotime($request->tglmulai)));
				$tahun = date('Y', strtotime('+' . $i . ' day', strtotime($request->tglmulai)));

    $jadwal = [
        'kerjake' => $i +1, 
        'tasemeter_id' => $gas->id,
        'tanggal'=> $tgl,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'hari' => $hari
    ];

     
    Jadwal::create($jadwal);
    
}

       
     
       

        return redirect()->route('tasemeter', $gas->id)->with('sukses', 'Data Berhasil di-Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasemeter = Tasemeter::find($id);
        $jadwal = Jadwal::where('tasemeter_id', $id)
               ->get();

               
        $user = User::all();

        $dataabsen = Dataabsen::all();
        return view('tasemeter.absen', compact('tasemeter', 'jadwal','user', 'dataabsen'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
