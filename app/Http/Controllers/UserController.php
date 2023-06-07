<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai.index',[
            'users'=> User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create',[
            'users'=> User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek=$request->validate([
            'foto' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'tanggal_join' => 'required',
            ]);
            $cek['password']=Hash::make($request->password);
            if ($request->file('foto')) {
                $cek['foto'] = $request->file('foto')->store('user', 'public');
            }
            User::create($cek);
            return redirect('/datapegawai')
            ->with('success', 'Pegawai Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cek=User::where('id', $id)->first();
        return view('pegawai.edit', [
            'users' => $cek,
        ]);
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
        $cek=$request->validate([
            'foto' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'tanggal_join' => 'required',
            ]);
        $cek['password']=Hash::make($request->password);

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $cek['foto'] = $request->file('foto')->store('users', 'public');
        }

        User::where('id', $id)->update($cek);


        return redirect('/datapegawai')->with('toast_success', 'Pegawai berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/datapegawai')->with('toast_success', 'Pegawai berhasil di hapus!');
    }
}
