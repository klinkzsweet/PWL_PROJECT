<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataServiceController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.index',[
            'service'=> DataService::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create',[
            'service'=> DataService::all()
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
            'nama' => 'required',
            'biaya' => 'required',

            ]);
            DataService::create($cek);
            return redirect('/service')
            ->with('success', 'Service Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek=DataService::where('id', $id)->first();
        return view('service.detail', [
            'service' => $cek,
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
        $cek=DataService::where('id', $id)->first();
        return view('service.edit', [
            'service' => $cek,
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
            'nama' => 'required',
            'biaya' => 'required',
 
        ];

        $validatedata = $request->validate($rules);

        DataService::where('id', $id)->update($validatedata);


        return redirect('/service')->with('toast_success', 'service berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataService::destroy($id);
        return redirect('/service')->with('toast_success', 'service berhasil di hapus!');
    }
}
