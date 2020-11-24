@extends('layouts.template')
@section('title','Tambah Barang')
@section('style')
<!-- page css -->
<link href="{{ asset('assets/vendors/select2/select2.css')}}" rel="stylesheet">
<link href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('thing.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="masukan nama barang" aria-describedby="">
            </div>
            <div class="form-group">
                <label for="telp">Pilih Merk</label>
                <div class="m-b-15">
                    <select class="select2" name="merk_id">
                        @foreach ($merks as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="telp">Pilih Distributor</label>
                <div class="m-b-15">
                    <select class="select2" name="distributor_id">
                        @foreach ($distributors as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Tanggal Masuk Barang</label>
                <div class="input-affix m-b-10">
                    <i class="prefix-icon anticon anticon-calendar"></i>
                    <input type="text" name="entry" class="form-control datepicker-input" placeholder="Pick a date">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                </div>
                <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                    <span class="input-group-text">,00</span>
                </div>
            </div>
            <div class="form-group">
                <label for="stock">Stok Barang</label>
                <input type="text" name="stock" id="stock" class="form-control" placeholder="masukan Jumlah barang" aria-describedby="">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a name="" id="" class="btn btn-default" href="{{ route('thing.index') }}" role="button">Kembali</a>
        </form>
    </div>
</div>

@endsection
@section('script')
<script src="{{ asset('assets/vendors/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script>
    $('.select2').select2();
    $('.datepicker-input').datepicker();
</script>
@endsection
