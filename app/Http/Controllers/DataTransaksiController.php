<?php

namespace App\Http\Controllers;

use App\Models\DataSparepart;
use App\Models\DataService;
use App\Models\DataCustomer;
use App\Models\DataTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataTransaksiController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index',[
            'transaksi'=> DataTransaksi::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create',[
            'transaksi'=> DataTransaksi::all(), 'data_spareparts'=> DataSparepart::all(), 'data_customers'=> DataCustomer::all(), 'service'=> DataService::all(),
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
            'customer_id' => 'required',
            'service_id' => 'required',
            'sparepart_id' => 'required',

            ]);
            $DataSparepart = DataSparepart::find($request->sparepart_id);
            $DataService = DataService::find($request->service_id);
            $data = [
                'customer_id' => $request->customer_id,
                'service_id' => $request->service_id,
                'sparepart_id' => $request->sparepart_id,
                'biaya' => @$DataSparepart->harga+@$DataService->biaya,
            ];
            DataTransaksi::create($data);

            return redirect('/transaksi')
            ->with('success', 'transaksi Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek=DataTransaksi::where('id', $id)->first();
        return view('transaksi.detail', [
            'transaksi' => $cek,
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
        $cek=DataTransaksi::where('id', $id)->first();
        return view('transaksi.edit', [
            'transaksi' => $cek, 'data_spareparts'=> DataSparepart::all(), 'data_customers'=> DataCustomer::all(), 'service'=> DataService::all(),
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
            'customer_id' => 'required',
            'service_id' => 'required',
            'sparepart_id' => 'required',
            'biaya' => 'required',
 
        ];

        $validatedata = $request->validate($rules);

        $DataSparepart = DataSparepart::find($request->sparepart_id);
            $DataService = DataService::find($request->service_id);
            $data = [
                'customer_id' => $request->customer_id,
                'service_id' => $request->service_id,
                'sparepart_id' => $request->sparepart_id,
                'biaya' => $DataSparepart->harga+$DataService->biaya,
            ];

        DataTransaksi::where('id', $id)->update($data);


        return redirect('/transaksi')->with('toast_success', 'transaksi berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataTransaksi::destroy($id);
        return redirect('/transaksi')->with('toast_success', 'transaksi berhasil di hapus!');
    }
}
