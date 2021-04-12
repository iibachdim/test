@extends('home')

@section('title', 'Input Penjualan')
@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <div class="card"   >
                <div class="card-header">
                  <h4>{{ __('Input Penjualan') }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('penjualan.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pembeli</label>
                            <input class="form-control" type="text" placeholder="{{ __('Nama Pembeli') }}" name="nama_pembeli" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="{{ __('Email') }}" name="email" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>No HP</label>
                            <input class="form-control" type="text" placeholder="{{ __('No HP') }}" name="no_hp" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <select class="form-control" name="mobil_id">
                                @foreach($mobil as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_mobil }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-block btn-info" type="submit">{{ __('Tambah') }}</button>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-block btn-primary">{{ __('Kembali') }}</a> 
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection