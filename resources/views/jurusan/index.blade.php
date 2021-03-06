@extends('layouts.adminmain')
@section('title', 'Jurusan')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
       @if($message = Session::get('success'))
          <div class="alert alert-success">
            <p> {{ $message }} </p>
          </div>
        @endif
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('jurusan.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <table>
            <tr>
              <td width="900">
          <div class="card-header">
            <div class="form-group">
            <a href="{{ route('jurusan.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div></div></td>
          <td>
           <div class="card-header">
               <a href="cetak/cetak_pdf_jurusan" class="btn btn-dark" target="_blank"> PDF </a>
               
            <a href="cetak/export_excel_jurusan" class="btn btn-success my-3" target="_blank">EXCEL</a>
            </a>
              </div></td></tr>
        </table>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Fakultas</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $jurusan)
                <tr>
                  <td>{{ $jurusan->id }}</td>
                  <td>{{ $jurusan->name }}</td>
                  <td>{{ $jurusan->fakultas->nama_fakultas }}</td>
                  <td>
                    <a href="{{ route('jurusan.edit', ['id' => $jurusan->id]) }}">
                      <button type="button" class="btn btn-sm btn-warning">Edit</button>
                    </a>
                   <a href="{{ route('jurusan.delete', ['id' => $jurusan->id]) }}"
                    onclick="return confirm('Delete data?');" 
                    >
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </a>
                   </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {!! $data->appends(request()->except('page'))->render() !!}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()