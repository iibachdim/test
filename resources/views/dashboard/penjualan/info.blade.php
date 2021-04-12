@extends('home')

@section('title', 'Info Penjualan')
@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                  <h4>{{ __('Info Penjualan') }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped" style="border: 1">
                        @foreach($penjualan as $p => $item)
                        <tr>
                            <th colspan="2">Data Hari Ini</th>
                        </tr>
                        <tr>
                            <td>Mobil Yang Paling Banyak Dijual</td>
                            <td>{{ $item->nama_mobil }}</td>
                        </tr>
                        @endforeach
                        @foreach($countPenjualan as $c => $item)
                        <tr>
                            <td>Penjualan Hari Ini</td>
                            <td>{{ $item->total_jual }}</td>
                        </tr>
                        @endforeach
                        @foreach ($sumTotal as $t => $item)
                        <tr>
                            <td>Total Penjualan Hari Ini</td>
                            <td>{{ "$" . number_format($item->total_penjualan) }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection