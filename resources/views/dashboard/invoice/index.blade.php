@extends('home')

@section('title', 'Invoice')
@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4>Invoice</h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-xl">
                    @foreach ($invoice as $item)
                        <tr>
                            <th>No Invoice</th>
                            <td>:</td>
                            <td><h3>{{ $item->no_invoice }}</h3></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Nama Pembeli</th>
                            <td>:</td>
                            <td>{{ $item->nama_pembeli }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td>:</td>
                            <td>{{ $item->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Nama Mobil</th>
                            <td>:</td>
                            <td>{{ $item->nama_mobil }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>:</td>
                            <td>{{ "$" . number_format($item->harga) }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>:</td>
                            <td><h3>{{ "$" . number_format($item->total) }}</h3></th>
                        </tr>
                    @endforeach
                    </table>
                    <div class="card-body">
                        <a href="{{ route('penjualan.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection