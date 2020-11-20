@extends('layouts.template')
@section('title','Edit Barang')
@section('style')
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('item.update',$data) }}" method="post">
        @csrf @method('patch')
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="masukan nama " aria-describedby="" value="{{ old('name',$data->name) }}">
            </div>
            <div class="form-group">
              <label for="">Kategori</label>
              <select class="form-control" name="id_category" id="">
                @foreach ($category as $i)
                    <option
                    @if ($data->id_category = $i)
                        selected
                    @endif
                    value="{{ $i->id }}">{{ $i->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="unit">Satuan</label>
              <select class="form-control" name="unit" id="unit">
                <option
                 @if ($data->unit == "kg")
                    selected
                @endif
                value="kg" >Kg</option>
                <option
                 @if ($data->unit == "ons")
                    selected
                @endif
                value="ons">Ons</option>
              </select>
            </div>
            <div class="form-group">
              <label for="price">Harga</label>
              <input type="number" name="price" id="price" class="form-control" placeholder="" aria-describedby="" value="{{ old('price',$data->price) }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a name="" id="" class="btn btn-default" href="{{ route('item.index') }}" role="button">Kembali</a>
        </form>
    </div>
</div>

@endsection
@section('script')
@endsection
