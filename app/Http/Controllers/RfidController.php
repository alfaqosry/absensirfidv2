<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Dataabsen;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RfidController extends Controller
{
    public function Rfid($id) {
      
        
        $tglsaatini = date('d');
        $blnsaatini = date('m');
        $thnsaatini = date('Y');
        $jamsaatini = date('H:i');
     
        $jammasuk = '07:30';
        $jamkeluar = '12:00';
        

        $jadwasaatini = Jadwal::where('tanggal', $tglsaatini)
        ->where('bulan', $blnsaatini)
        ->where('tahun', $thnsaatini)->first();
        $user = User::where('rfid', $id)->first();

       
        $user = User::where('rfid', $id)->first();

        if( $user != null) {
             $cekin = Dataabsen::where('jadwal_id', $jadwasaatini->id )
        ->where('user_id' , $user->id)->first();


            if( $jadwasaatini != null ) {
    if( $jadwasaatini->hari != "Sunday"){
    
 
                if (strtotime($jamsaatini) <= strtotime($jammasuk) &&  !$cekin  ){
                    
                    
                  
                    $data = [
                        'jadwal_id' => $jadwasaatini->id,
                        'user_id' => $user->id,
                        'status' => "Hadir",
                        'in' => $jamsaatini,
                        'out' => null

                    ];

                    Dataabsen::create($data);
                    $response = [
                        'message' => 'Absen Berhasil',
                        'status' =>"berhasil",
                        'nama' => $user->name
                        
                    ];
            
                    return response()->json($response, Response::HTTP_OK);


                }elseif (strtotime($jamsaatini) >= strtotime($jammasuk) &&  !$cekin ) {
                   
                    
                    $data = [
                        'jadwal_id' => $jadwasaatini->id,
                        'user_id' => $user->id,
                        'status' => "Terlambat",
                        'in' => $jamsaatini,
                        'out' => null

                    ];

                    Dataabsen::create($data);
                    $response = [
                        'message' => 'Absen Terlambat',
                        'status' =>"berhasil",
                        'nama' => $user->name
                        
                    ];
            
                    return response()->json($response, Response::HTTP_OK);
                }elseif(strtotime($jamsaatini) >= strtotime($jamkeluar) &&  $cekin){

                    $absenkeluar = Dataabsen::find($cekin->id);
                    $absenkeluar->out =$jamsaatini;
                    $absenkeluar->save();

                    $response = [
                        'message' => 'Absen Pulang',
                        'status' =>"berhasil",
                        'nama' => $user->name
                        
                    ];
            
                    return response()->json($response, Response::HTTP_OK);

                }else {

                    
                    $response = [
                        'message' => 'Anda Sudah Absen',
                        'status' =>"gagal",
                        'nama' => $user->name
                        
                    ];
            
                    return response()->json($response, Response::HTTP_OK);

                }
            }else{
                $response = [
                    'message' => 'Hari ini libur',
                    'status' =>"gagal",
                    'nama' => $user->name
                    
                ];
        
                return response()->json($response, Response::HTTP_OK);
            }
            }else {
                $response = [
                    'message' => 'Jadwal tidak di temukan',
                    'status' =>"gagal",
                    
                ];
        
                return response()->json($response, Response::HTTP_OK);
            }
            
        }else{

            $response = [
                'message' => 'Tidak terdaftar',
                'status' =>"tidak terdaftar",
                
            ];
    
            return response()->json($response, Response::HTTP_OK);

        }

    }
}
