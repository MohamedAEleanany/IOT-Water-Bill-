<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $client = client::all();
        return view('Customer.client',compact('client'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("adsasd");
         
        
        $client =new client();
        $client->name = $request->name;
        $client->serial_id = $request->serial_id;
        $client->national_id = $request->national_id;
        $client->address = $request->address;
        $client->save();
        return back()->with('success', 'تم اضافه الشريحه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // dd("adasd00");
        
        $client = client::find($id);
        
        $client->update(['name' => $request->name,
        'serial_id'=> $request->serial_id,
        'national_id'=> $request->national_id,
        'address'=> $request->address,
        
    ]);
        $client->save();
        return back()->with('success', 'تم تعديل الشريحه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::find($id); 
        client::find($id)->delete();
        return back()->with('success', 'تم الحذف الشريحه بنجاح');
    }
}
