@extends('layouts.admin')

@section('title', 'level')

@section('content')
<div class="judul">
    <div>
        <h2>Level User</h2>
    </div>
    <div>Home > Role</div>
</div>
    <div class="main-content">
        <div class="title">
            <h2>
                Daftar
            </h2>
            <div class="actions">
                <a class="btn-add" href="{{ route('level.add') }}">
                    Tambah
                </a>
                <a class="btn-export" href="">
                    Export
                </a>
                <a class="btn-import" href="">
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

        <table class="table ">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($level as $key => $data)
                <tr>
                    <td>{{ $level->firstitem() + $key }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a class="btn-primary mr-2" href="{{ route('level.edit',['id' => $data->id]) }}">
                            Ubah
                        </a>
                        <a class="btn-danger" href="{{ route('level.delete',['id' => $data->id]) }}">
                            Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $level->links() }}
    </div>
@endsection
