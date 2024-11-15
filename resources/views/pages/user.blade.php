@extends('layouts.admin')

@section('title', 'User')

@section('content')
<div class="judul">
    <div>
        <h2>Data User</h2>
    </div>
    <div>Home > User</div>
</div>
<div class="main-content">
    <div class="title">
        <h2>
            Daftar
        </h2>
        <div class="actions">
            <a class="btn-add" href="{{ route('user.add') }}">
                Tambah
            </a>
            <a class="btn-export">
                Export
            </a>
            <a class="btn-import">
                Import
            </a>
        </div>
    </div>

    <div class="cont">
        <div class="left-section">
            <span>Tampilkan</span>
            <div class="pag">
                <select>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </div>
            <span class="ml-2">Entri</span>
        </div>
        <div class="right-section">
            <form action="">
                <div class="button">
                <i class="fas fa-search"></i>
                <input name="keyword" placeholder="Cari" style="border: none; outline: none;">
                </div>
            </form>
        <div class="button" style="margin-top: -15px; margin-left: 10px; height: 40px;">
            <i class="fas fa-filter"></i>
            <span>Filter</span>
        </div>
    </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomer HP</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
            <tr>
                <td>{{ $data->firstitem() + $key }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                @if ($item->levels)
                    <td>{{ $item->levels->name }}</td>
                @else
                    <td></td>
                @endif
                <td>
                    <a  class="btn btn-primary mr-2" href="{{ route('user.edit',['id' => $item->id]) }}">Ubah</a>
                    <a  class="btn btn-danger" href="{{ route('user.delete',['id' => $item->id]) }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div>

@endsection
