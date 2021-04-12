@extends('home')

@section('title', 'Edit Mobil')
@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <div class="card"   >
                <div class="card-header">
                  <h4>{{ __('Edit') }}: {{ $penjualan->nama_mobil }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/penjualan/{{ $penjualan->id }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Pembeli</label>
                            <input class="form-control" type="text" placeholder="{{ __('Nama Pembeli') }}" name="nama_pembeli" value="{{ $penjualan->nama_pembeli }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="{{ __('Email') }}" name="email" value="{{ $penjualan->email }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>No Hp</label>
                            <input class="form-control" type="text" placeholder="{{ __('No HP') }}" name="no_hp" value="{{ $penjualan->no_hp }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <select class="form-control" name="mobil_id">
                                @foreach ($mobil as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_mobil }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-block btn-info   " type="submit">{{ __('Simpan') }}</button>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-block btn-danger">{{ __('Kembali') }}</a> 
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection