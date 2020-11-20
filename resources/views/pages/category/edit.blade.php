@extends('layouts.template')
@section('title','Edit Kategori barang')
@section('style')
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('category.update',$data) }}" method="post">
        @csrf @method('patch')
            <div class="form-group">
                <label for="name">Merk</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}" placeholder="masukan nama merk" aria-describedby="">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a name="" id="" class="btn btn-default" href="{{ route('category.index') }}" role="button">Kembali</a>
        </form>
    </div>
</div>

@endsection
@section('script')
@endsection
