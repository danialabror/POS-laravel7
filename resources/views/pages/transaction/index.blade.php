@extends('layouts.template')
@section('title','Transaksi')
@section('style')
<link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<style>
    .basket{
        height: 350px;
        overflow: auto;
    }
    .background-card{
        background-color: #ecf0f1 !important;
    }
</style>
@endsection
@section('content')
<input type="hidden" value="{{ $trasanction_id->id }}" id="transaction_id">
<div class="">
    <div class="row">
        <div class="col-md-4">
            <div class="card background-card" >
                <div class="card-body">
                    <h4 class="card-title">Pencarian Barang</h4>
                    <div class="form-group">
                      <label for="id_item">Barang</label>
                      <select class="form-control select2" name="id_item" id="id_item">
                        <option selected disable value="">pilih barang</option>
                        @foreach ($item as $i)
                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <label for="">Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control" readonly id="price" value="00">
                        <div class="input-group-append">
                            <span class="input-group-text" id="unit"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount">Jumlah</label>
                                <input type="number" name="amount" id="amount" class="form-control" placeholder="masukan jumalh yang diperlukan" aria-describedby="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Total</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="number" class="form-control" readonly name="total" id="total" value="">
                            </div>
                        </div>

                    </div>
                    <button id="add_button" class="btn btn-light btn-lg btn-block">Tambahkan</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card background-card">
                <div class="card-body">
                    <h4 class="card-title">Keranjang</h4>
                    <div class="basket">
                        <table class="table table-hover table-bordered " id="data_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-elements.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.js') }}"></script>

<script>

    var trasanction_id = $('#transaction_id').val();
    // function getAvailableTransaction() {
    //     $.ajax({
    //         url : "{{ route('getavailabletranscation') }}",
    //         type:'get',
    //         success : function (data) {
    //             trasanction_id = data.id;
    //         }
    //     });
    // }
    // alert(trasanction_id);
    // getAvailableTransaction();
    function formatRupiah(bilangan) {
        var	reverse = bilangan.toString().split('').reverse().join(''),
        ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');

        return 'Rp'+ribuan;

    }
    function fetch_data() {
        $.ajax({
            url : "{{ url('getbasket') }}"+"/"+trasanction_id,
            type:'get',
            dataType:"json",
            success : function (data) {
                console.log(data);
                var no = 1;
                var html = '';
                for( var count = 0; count < data.length; count++){
                    var name = data[count].name;
                    var amount = data[count].amount;
                    var total = data[count].total;
                    html += '<tr>';
                    html += '<td>'+(no++)+'</td>';
                    html += '<td><b>'+name+'</b></td>';
                    html += '<td>'+amount+'</td>';
                    html += '<td>'+formatRupiah(total)+'</td>';
                    // html += '<td><button href="#" class="hehe" data-id="'+data[count].id+'">hapus</button></td>';
                    // <button class="hehe">asd</button>
                    html += '<td><button class="btn btn-danger" onclick="deleteButton()" data-id="'+data[count].id+'">Hapus</button></td>';
                    html += '</tr>';
                }
                $('tbody').html(html);
            }
        });
    }
    fetch_data();

   $('#id_item').change(function(){
        var id_item = $(this).val();
        $.ajax({
            url: "{{ url('getitem') }}"+'/'+id_item,
            type: 'get',
            data: {
                id_item: id_item
            },
            success: function(data) {
                // console.log(data);
                $('#price').val(data.price);
                $('#unit').html('/'+data.unit);
            }
        });
    });

    $('#amount').keyup(function () {
        if($('#id_item').val() == ''){
            alert('pilih barang terlebih dahulu!');
            $(this).val('');
        }else{
            var a = $(this).val();
            var b = $('#price').val();
            var total = a * b;
            $('#total').val(total);
        }
    });

    $('#add_button').click(function () {
        var id_item = $('#id_item').val();
        var amount = $('#amount').val();

        if(!id_item || !amount ){
            alert('pilih barang dan masukan jumlah yang diinginkan!');
        }else{
            $.ajax({
                url : "{{ route('detailtransaction.store') }}",
                type : 'post',
                data : {
                    id_item : id_item,
                    amount : amount,
                    _token : "{{ csrf_token() }}",
                },
                success: function () {
                    fetch_data();
                }
            });
        }



    });


    function deleteButton() {
        var id = $(this).attr('data-id');
        alert(id);
        var route = "{!! route('detailtransaction.destroy',"+ id +") !!}";
        var answer = window.confirm("Hapus?");
        if (answer) {
            // $('#del_form').attr('action',route);
            // $('#del_form').submit();
            $.ajax({
                url : route,
                type : 'delete',
                data : {
                    _token : "{{ csrf_token() }}",
                },
                success: function () {
                    fetch_data();
                }
            });
        }
        else {
            alert('Data tidak dihapus');
        }
    }

</script>
@endsection
