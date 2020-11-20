@extends('layouts.template')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">Rp 230.000</h2>
                            <p class="m-b-0 text-muted">Pendapatan Hari Ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-inbox"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">217</h2>
                            <p class="m-b-0 text-muted">Produk terjual hari ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">Rp30.000.000</h2>
                            <p class="m-b-0 text-muted">Pendapatan Bulan Ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-inbox"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">Rp5.630.000</h2>
                            <p class="m-b-0 text-muted">Margin Bulan Ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Grafik Pendapatan</h5>

                    </div>
                    <div class="m-t-50" style="height: 330px">
                        <canvas class="chart" id="revenue-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center">
                        <h5>Produk terlaris</h5>
                        <div>
                            {{-- <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a> --}}
                        </div>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Dijual</th>
                                        <th>Pendapatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Sayur Kol
                                        </td>
                                        <td>81 kg</td>
                                        <td>Rp3.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Wortel
                                        </td>
                                        <td>70 kg</td>
                                        <td>Rp2.500.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
@endsection
