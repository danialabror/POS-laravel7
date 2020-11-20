@extends('layouts.template')
@section('title','Tambah Barang')
@section('style')
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('distributor.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="name">Nama Distributor</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="masukan nama distributor" aria-describedby="">
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <input type="text" name="address" id="address" class="form-control" placeholder="masukan alamat distributor " aria-describedby="">
          </div>
          <div class="form-group">
            <label for="telp">No. Telp</label>
            <input type="text" name="telp" id="telp" class="form-control" placeholder="masukan No.telp distributor " aria-describedby="">
        </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a name="" id="" class="btn btn-default" href="{{ route('distributor.index') }}" role="button">Kembali</a>
        </form>
    </div>
</div>

@endsection
@section('script')
@endsection
