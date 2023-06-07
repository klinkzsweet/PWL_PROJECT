<?php

namespace App\Http\Controllers;

use App\Models\DataSparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataSparepartController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sparepart.index',[
            'data_spareparts'=> DataSparepart::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sparepart.create',[
            'data_spareparts'=> DataSparepart::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek=$request->validate([
            'image' => 'required',
            'nama' => 'required',
            'harga' => 'required',

            ]);
            if ($request->file('image')) {
                $cek['image'] = $request->file('image')->store('image', 'public');
            }
            DataSparepart::create($cek);
            return redirect('/datasparepart')
            ->with('success', 'sparepart Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek=DataSparepart::where('id', $id)->first();
        return view('sparepart.detail', [
            'data_spareparts' => $cek,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cek=DataSparepart::where('id', $id)->first();
        return view('sparepart.edit', [
            'data_spareparts' => $cek,
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
        $rules = [
            'image' => 'required',
            'nama' => 'required',
            'harga' => 'required',
 
        ];

        $validatedata = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedata['image'] = $request->file('image')->store('datasparepart', 'public');
        }

        DataSparepart::where('id', $id)->update($validatedata);


        return redirect('/datasparepart')->with('toast_success', 'sparepart berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataSparepart::destroy($id);
        return redirect('/datasparepart')->with('toast_success', 'sparepart berhasil di hapus!');
    }
}