<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $data = Discount::orderBy('amount')->get();
        return view('pages.discount.index',[
            'data' =>$data
        ]);
    }

    public function create()
    {
        return view('pages.discount.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'amount' => 'required|integer|max:100|min:0'
        ]);
        Discount::create([
            'amount' => $request->amount
        ]);

        return back()->with('message','DATA BERHASIL DITAMBAHKAN!');
    }

    public function show(Discount $discount)
    {
        // melihat list barang yang berhubungan dengan salah satu kategori
    }

    public function edit(Discount $discount)
    {
        return view('pages.discount.edit',[
            'data' => $discount
        ]);
    }

    public function update(Request $request, Discount $discount)
    {
        $this->validate($request,[
            'amount' => 'required|integer|max:100|min:0'
        ]);
        $discount->update([
            'amount' => $request->amount
        ]);

        return back()->with('message','DATA BERHASIL DIRUBAH!');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return back()->with('message','DATA BERHASIL DIHAPUS!');
    }
}
