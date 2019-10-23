<?php

namespace App\Http\Controllers;

use App\AddressList;
use Illuminate\Http\Request;
use Alert;
class AddressListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('address');
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
        
        $address = new AddressList();
        $address->name = $request->name;
        $address->type = $request->type;

        $address->save();
        Alert::success('Success Title', 'Success Message');

        return view('address');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AddressList  $addressList
     * @return \Illuminate\Http\Response
     */
    public function show(AddressList $addressList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddressList  $addressList
     * @return \Illuminate\Http\Response
     */
    public function edit(AddressList $addressList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddressList  $addressList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddressList $addressList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddressList  $addressList
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddressList $addressList)
    {
        //
    }
}
