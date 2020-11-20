@extends('layouts.template')
@section('title','Edit Jumlah Diskon')
@section('style')
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('discount.update',$data) }}" method="post">
        @csrf @method('patch')
            <div class="form-group">
                <label for="name">jumlah discount</label>
                <input type="number" name="amount" id="amount" class="form-control" value="{{ $data->amount }}" placeholder="masukan jumlah discount" aria-describedby="">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a name="" id="" class="btn btn-default" href="{{ route('discount.index') }}" role="button">Kembali</a>
        </form>
    </div>
</div>

@endsection
@section('script')
@endsection
