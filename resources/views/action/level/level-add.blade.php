@extends('layouts.admin')

@section('title', 'Add Class ')

@section('content')
    <div class="judul">
        <div>
            <h2>Level User</h2>
        </div>
        <div>Role > Tambah</div>
    </div>
    <div class="main-content">
        <div class="form-aksi">
            <div class="aksi">
                <div>
                    <p>Tambah</p>
                </div>
                <div>
                    <a href="{{ route('level') }}"><i class="fas fa-x"></i></a>
                </div>
            </div>
            <hr>
            <form action="{{ route('level.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name"><p>Nama</p></label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="kemsi">
                    <a href="{{ route('level') }}" class="btn btn-light mr-3">Kembali</a>
                    <button class="btn btn-primary" class="btn" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection