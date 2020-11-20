@extends('layouts.template')
@section('title','Data Barang')
@section('style')
<link href="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<a name="" id="" class="btn btn-success" href="{{ route('distributor.create') }}" role="button">Tambah Barang</a>
<br><br>
<table id="data-table" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->telp }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle"  data-toggle="dropdown">
                        <span>Aksi</span>
                    </button>
                    <div class="dropdown-menu">
                        {{-- <a class="dropdown-item" href="#">Detail</a> --}}
                        <a class="dropdown-item" href="{{ route('distributor.edit',$item) }}">Edit</a>
                        <a class="dropdown-item del_button" href="#" data-id="{{ $item }}" data-route="{{ route('distributor.destroy', $item) }}">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('script')
<script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.js') }}"></script>


<script>
    $(document).ready(function(){
       $('.del_button').click(function(){
        var id = $(this).attr('data-id');
        var route = $(this).attr('data-route');
        var answer = window.confirm("Hapus?");
        if (answer) {
           $('#del_form').attr('action',route);
           $('#del_form').submit();
        }
        else {
            alert('Data tidak dihapus');
        }

       });
    });
</script>
@endsection
