@extends('home')

@section('title', 'Data Mobil')
@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                  <h4>{{ __('Data Mobil') }}</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('mobil.create') }}" class="btn btn-info">Tambah Mobil</a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Mobil</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php 
                    $no = 1;
                    @endphp
                       @foreach($mobil as $m)
                       <tr>
                         <td>{{ $no++ }}</td>
                         <td>{{ $m->nama_mobil }}</td>
                         <td>{{"$" . number_format($m->harga) }}</td>
                         <td>{{ $m->stok }}</td>
                         <td>
                            <a href="{{ url('/mobil/' . $m->id . '/edit') }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('mobil.destroy', 'id='.$m->id ) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
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