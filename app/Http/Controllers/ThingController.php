<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thing;
use App\Category;
use App\Distributor;

class ThingController extends Controller
{
    public function index()
    {
        $data = Thing::all();
        return view('pages.thing.index',[
            'data' =>$data
        ]);
    }

    public function create()
    {
        $merks = Category::all();
        $distributors = Distributor::all();
        return view('pages.thing.create', compact('merks', 'distributors'));
    }

    public function store(Request $request)
    {
        $tanggal = strtotime($request->entry);

        $this->validate($request,[
            'name' => 'required',
            'merk_id' => 'required',
            'distributor_id' => 'required',
            'entry' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
        Thing::create([
            'name' => $request->name,
            'merk_id' => $request->merk_id,
            'distributor_id' => $request->distributor_id,
            'entry' => date('Y-m-d',$tanggal),
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect('/thing')->with('message','DATA BERHASIL DITAMBAHKAN!');
    }

    public function destroy(Thing $thing)
    {
        $thing->delete();
        return back()->with('message','DATA BERHASIL DIHAPUS!');
    }
}
