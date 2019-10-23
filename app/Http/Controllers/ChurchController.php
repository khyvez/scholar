<?php

namespace App\Http\Controllers;

use App\Church;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    public function index()
    {
        $churches = Church::all();
        return view('admin.church', compact('churches'));
    }

    public function create()
    {
        return view('admin.create_church');
    }

    public function store(Request $request)
    {
        Church::create($request->all());
        return redirect()->route('church.index');
    }

    public function show(Church $church)
    {
        //
    }
  public function edit(Church $church)
    {
        //
    }

    public function update(Request $request, Church $church)
    {
        //
    }

    public function destroy(Church $church)
    {
        //
    }
}
