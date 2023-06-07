<?php

namespace App\Http\Controllers;

use App\Models\DataCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\DataTransaksi;

class DataCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index',[
            'data_customers'=> DataCustomer::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create',[
            'data_customers'=> DataCustomer::all()
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
            'alamat' => 'required',
            'notelp' => 'required',
            ]);
            if ($request->file('image')) {
                $cek['image'] = $request->file('image')->store('image', 'public');
            }
            DataCustomer::create($cek);
            return redirect('/datacustomer')
            ->with('success', 'Customer Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek=DataCustomer::where('id', $id)->first();
        return view('customer.detail', [
            'data_customers' => $cek,
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
        $cek=DataCustomer::where('id', $id)->first();
        return view('customer.edit', [
            'data_customers' => $cek,
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
        $rules = ([
            'image' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'notelp' => 'required',
            ]);

        $validatedata = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedata['image'] = $request->file('image')->store('datacustomer', 'public');
        }

        DataCustomer::where('id', $id)->update($validatedata);


        return redirect('/datacustomer')->with('toast_success', 'Customer berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataTransaksi::where('customer_id',$id)->delete();
        DataCustomer::destroy($id);
        return redirect('/datacustomer')->with('toast_success', 'Customer berhasil di hapus!');
    }
}
