@extends('layouts.template')
@section('title','Tambah Jumlah Diskon')
@section('style')
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('discount.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="name">Jumlah Diskon</label>
                <input type="number" name="amount" id="amount" class="form-control" placeholder="masukan nama kategori" aria-describedby="">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a name="" id="" class="btn btn-default" href="{{ route('discount.index') }}" role="button">Kembali</a>
        </form>
    </div>
</div>

@endsection
@section('script')
@endsection
