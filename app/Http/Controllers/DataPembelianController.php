<?php

namespace App\Http\Controllers;

use App\Models\DataSparepart;
use App\Models\DataPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class DataPembelianController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembelian.index',[
            'pembelian'=> DataPembelian::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelian.create',[
            'pembelian'=> DataPembelian::all(), 'data_spareparts'=> DataSparepart::all()
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
            'sparepart_id' => 'required',
            'jumlah' => 'required'

            ]);
            DataPembelian::create($cek);
            $DataSparepart = DataSparepart::find($request->sparepart_id);
            $stok = $DataSparepart->stok + $request->jumlah;
            DataSparepart::where('id', $request->sparepart_id)->update(['stok' => $stok]);
            return redirect('/pembelian')
            ->with('success', 'pembelian Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek=DataPembelian::where('id', $id)->first();
        return view('pembelian.detail', [
            'pembelian' => $cek, 'data_spareparts'=> DataSparepart::all()
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
        $cek=DataPembelian::where('id', $id)->first();
        return view('pembelian.edit', [
            'pembelian' => $cek,  'data_spareparts'=> DataSparepart::all()
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
            'sparepart_id' => 'required',
            'jumlah' => 'required'
 
        ];

        $DataPembelian =DataPembelian::where('id', $id)->first();

        $DataSparepart =DataSparepart::where('id', $request->sparepart_id)->first();
        $stok = $DataSparepart->stok - $DataPembelian->jumlah;
        DataSparepart::where('id', $request->sparepart_id)->update(['stok' => $stok]);

        $validatedata = $request->validate($rules);
        DataPembelian::where('id', $id)->update($validatedata);
        $DataSparepart = DataSparepart::find($request->sparepart_id);
        $stok = $DataSparepart->stok + $request->jumlah;
        DataSparepart::where('id', $request->sparepart_id)->update(['stok' => $stok]);


        return redirect('/pembelian')->with('toast_success', 'pembelian berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DataPembelian =DataPembelian::where('id', $id)->first();

        $DataSparepart =DataSparepart::where('id', $DataPembelian->sparepart_id)->first();
        $stok = $DataSparepart->stok - $DataPembelian->jumlah;
        DataSparepart::where('id', $DataPembelian->sparepart_id)->update(['stok' => $stok]);
        DataPembelian::destroy($id);
        return redirect('/pembelian')->with('toast_success', 'pembelian berhasil di hapus!');
    }
}
