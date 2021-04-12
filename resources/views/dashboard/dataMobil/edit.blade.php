@extends('home')

@section('title', 'Edit Mobil')
@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <div class="card"   >
                <div class="card-header">
                  <h4>{{ __('Edit') }}: {{ $mobil->nama_mobil }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/mobil/{{ $mobil->id }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <input class="form-control" type="text" placeholder="{{ __('Nama Mobil') }}" name="nama_mobil" value="{{ $mobil->nama_mobil }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input class="form-control" type="number" placeholder="{{ __('Harga') }}" name="harga" value="{{ $mobil->harga }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input class="form-control" type="number" placeholder="{{ __('Stok') }}" name="stok" value="{{ $mobil->stok }}" required autofocus>
                        </div>

                        <button class="btn btn-block btn-info" type="submit">{{ __('Simpan') }}</button>
                        <a href="{{ route('mobil.index') }}" class="btn btn-block btn-danger">{{ __('Kembali') }}</a> 
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection