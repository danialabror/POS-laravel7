<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('name')->get();
        return view('pages.user.index',[
            $data => 'data'
        ]);
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name
        ]);

        return back()->with('message','success');
    }

    public function show(User $data)
    {
        // melihat list barang yang berhubungan dengan salah satu kategori
    }

    public function edit(User $data)
    {
        return view('pages.user.edit',[
            'data' => $data
        ]);
    }

    public function update(Request $request, Category $data)
    {
        $data->update([
            'name' => $request->name
        ]);

        return back()->with('message','success');
    }

    public function destroy(User $data)
    {
        $data->delete();
        return back()->with('message','success');
    }
}
