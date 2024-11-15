@extends('layouts.admin')

@section('title', 'Add Class ')

@section('content')
    <div class="judul">
        <div>
            <h2>Data User</h2>
        </div>
        <div>User > Delete</div>
    </div>
    <div class="main-content">
        <h2>Apakah Anda Yakin Untuk Mengapus USER {{ $data->name }}</h2>

        <form action="{{ route('user.destroy', ['id' => $data->id]) }}" method="post">
            @csrf
            @method('delete')
            <a href="{{ route('user') }}">Cancel</a>
            <button type="submit" class="btn btn-danger">Hapus </button>
        </form>
    </div>
    
@endsection