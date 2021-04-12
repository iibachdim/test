@extends('home')

@section('title', 'Penjualan')
@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                  <h4>{{ __('Penjualan') }}</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('penjualan.create') }}" class="btn btn-info">Input Penjualan</a>
                    <a href="{{ route('penjualan.info') }}" class="btn btn-dark">Info Penjualan</a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pembeli</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Nama Mobil</th>
                        <th>Harga</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    @php
                     $no = 1;   
                    @endphp
                    <tbody>
                      @foreach($penjualan as $p)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->created_at->format("d-M-Y") }}</td>
                        <td>{{ $p->nama_pembeli }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ $p->nama_mobil }}</td>
                        <td>{{ "$" . number_format($p->harga) }}</td>
                        <td>
                          <a href="{{ url('/penjualan/' . $p->id . '/edit') }}" class="btn btn-secondary">Edit</a>
                          <a href="{{ url('/penjualan/' . $p->id . '/invoice') }}" class="btn btn-info">Invoice</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection