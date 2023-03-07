<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PenggunaController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('pengguna.index', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pengguna.edit', compact('user'));
    }

    public function create(){
        return view('pengguna.create');
    }


    public function store(Request $request)
    {
        $validator =  $request->validate([
            'name'=>'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rfid' => 'required',
           
        ]);

        $user = $request->all();
        $user['password'] = bcrypt($request->password);

       
       User::create($user);

        return redirect()->route('pengguna.index')->with('sukses', 'Data Berhasil di-Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $changePassword = $request->password;
        if ($changePassword == null) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->rfid = $request->rfid;
            $user->jabatan = $request->jabatan;
            $user->save();

            return redirect()->route('pengguna.index', compact('user'))->with('sukses', 'Data Berhasil di-Update');
        } else {

            $user = User::find($id);
            $user->name = $request->name;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            return redirect()->route('pengguna.index', compact('user'))->with('sukses', 'Data Berhasil di-Update');
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return Redirect()->back()->with('sukses', 'User Berhasil di-Delete');
        } catch (\Illuminate\Database\QueryException $ex) {
            return Redirect()->back()->with('gagal', 'Tidak bisa di hapus karena data ini masih terpaut');
        }
    }
}
