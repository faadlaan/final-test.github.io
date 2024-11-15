@extends('layouts.admin')

@section('title', 'Add Class ')

@section('content')
    <div class="judul">
        <div>
            <h2>Level User</h2>
        </div>
        <div>Role > Delete</div>
    </div>
    <div class="main-content">
        <h2>Apakah Anda Yakin Untuk Mengapus Level {{ $level->name }}</h2>

        <form action="{{ route('level.destroy', ['id' => $level->id]) }}" method="post">
            @csrf
            @method('delete')
            <a href="{{ route('level') }}">Cancel</a>
            <button type="submit" class="btn btn-danger">Hapus </button>
        </form>
    </div>
    
@endsection