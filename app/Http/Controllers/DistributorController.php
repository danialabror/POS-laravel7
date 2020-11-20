<?php

namespace App\Http\Controllers;

use App\Distributor;
use App\Category;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $data = Distributor::orderBy('name')->get();
        return view('pages.distributor.index',[
            'data' =>$data
        ]);
    }

    public function create()
    {
        return view('pages.distributor.create',[
            'category' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required',
        ]);
        Distributor::create([
            'name' => $request->name,
            'address' => $request->address,
            'telp' => $request->telp,
        ]);

        return back()->with('message','DATA BERHASIL DITAMBAHKAN!');
    }

    public function show(Distributor $distributor)
    {
        // melihat list barang yang berhubungan dengan salah satu kategori
    }

    public function edit(Distributor $distributor)
    {
        return view('pages.distributor.edit',[
            'data' => $distributor,
            'category' => Category::all()
        ]);
    }

    public function update(Request $request, Distributor $distributor)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required',
        ]);
        $distributor->update([
            'name' => $request->name,
            'address' => $request->address,
            'telp' => $request->telp,
        ]);
        return back()->with('message','DATA BERHASIL DIRUBAH!');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return back()->with('message','DATA BERHASIL DIHAPUS!');
    }

    public function getdistributor(Distributor $id)
    {
        return response()->json($id);
    }
}
