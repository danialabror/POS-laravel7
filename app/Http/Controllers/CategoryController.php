<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::orderBy('name')->get();
        return view('pages.category.index',[
            'data' =>$data
        ]);
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        Category::create([
            'name' => $request->name
        ]);

        return back()->with('message','DATA BERHASIL DITAMBAHKAN!');
    }

    public function show(Category $category)
    {
        // melihat list barang yang berhubungan dengan salah satu kategori
    }

    public function edit(Category $category)
    {
        return view('pages.category.edit',[
            'data' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $category->update([
            'name' => $request->name
        ]);

        return back()->with('message','DATA BERHASIL DIRUBAH!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('message','DATA BERHASIL DIHAPUS!');
    }
}
