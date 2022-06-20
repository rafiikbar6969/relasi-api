@extends('template.master')
@section('judul', 'edit Data Dosen')

@section('isi')
    <h1>edit Data Dosen</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>

        @endforeach
    </ul>
    </div>
    @endif
    <div class="row mt-4">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Add Data dosen <a class="btn btn-sm btn-info float-end" href="{{ url('data-blog') }}">View Data</a></div>
                <div class="card-body">
                    <form action="{{ route('update.dosen', $dosen->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-gorup col-6">
                            <label for="">NIk</label>
                            <input type="text" name="nik" class="form-control" value="{{$dosen->nik}}">
                        </div>
                        <div class="form-gorup col-6">
                            <label for="">Nama</label>
                            <input type="text" name="nama_dosen" class="form-control" value="{{$dosen->nama_dosen}}">
                        </div>
                        <div class="form-gorup col-6">
                            <label for="">Umur</label>
                            <input type="number" name="umur" class="form-control" value="{{$dosen->umur}}">

                        <input type="submit" class="btn btn-primary mt-3" name="submit" value="save" >
                        <a class="btn btn-danger float-end mt-3" href="{{ url('data-blog') }}">Cencel</a>
                    </form>
                </div>
            </div>
        </div>
        </div>

@endsection
