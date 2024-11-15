@extends('layouts.admin')

@section('title', 'Add Class ')

@section('content')
    <div class="judul">
        <div>
            <h2>Data User</h2>
        </div>
        <div>User > Edit</div>
    </div>
    <div class="main-content">
        <div class="form-aksi">
            <div class="aksi">
                <div>
                    <p>Ubah</p>
                </div>
                <div>
                    <a href="{{ route('user') }}"><i class="fas fa-x"></i></a>
                </div>
            </div>
            <hr>
            <form action="{{ route('user.update', ['id' => $data->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name Level</label>
                    <input type="text" name="name" class="form-control" id=""  value="{{ $data->name }}">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id=""  value="{{ $data->email }}">
                </div>
                <div class="mb-3">
                    <label for="phone">Nomer HP</label>
                    <input type="text" name="phone" class="form-control" id=""  value="{{ $data->phone }}">
                </div>
                <div class="mb-3">
                    <label for="levels_id">Level</label>
                    <select type="text" name="levels_id" class="form-control" id="" >
                        <option value="{{ $data->levels->id }}">{{ $data->levels->name }}</option>
                        @foreach ($level as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="kemsi">
                    <a href="{{ route('user') }}" class="btn btn-light mr-3">Kembali</a>
                    <button class="btn btn-primary" class="btn" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection