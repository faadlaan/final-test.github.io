@extends('layouts.admin')

@section('title', 'Profil')
<style>
    .reset {
        width: 120px;
        background-color: #fff;
        border: 1px solid gray;
    }

    .save {
        width: 120px;
    }

    .cont {
        display: flex;
        justify-content: space-between;
    }

    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .form-group label {
        display: flex;
        justify-content: right;
        margin-left: -50px;
        color: #333;
        width: 150px;
    }

    .form-group input {
        flex: 1;
        padding: 10px;
        width: 400px;
        margin-left: 30px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    .profile-container {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 50px auto;
    }

    .profile-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        overflow: hidden;
    }

    .profile-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .camera-icon {
        position: absolute;
        top: 2px;
        right: 3px;
        color: white;
        border-radius: 50%;
        padding: 10px;
        font-size: 20px;
    }

    /* input gambar */
    .profile-photo {
        position: relative;
        display: inline-block;
        margin-top: -50px;
        margin-left: 100px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #2196F3;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Gaya ikon kamera */
    .camera-icon {
        font-size: 24px;
        color: white;
        cursor: pointer;
    }

    /* Sembunyikan input file asli */
    .file-input {
        display: none;
    }
</style>

@section('content')
    <div class="judul">
        <div>
            <h2>Profile</h2>
        </div>
        <div>Home > User</div>
    </div>
    <div class="main-content">
        <form class="kotak" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="cont">
                <div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" required>
                    </div>
                </div>

                <div class="profile-container">
                    <div class="profile-image">
                        <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default.webp') }}" alt="Foto Profil" id="profileImage">
                    </div>
                    <div class="profile-photo">
                        <label for="profilePhotoInput" class="camera-icon">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input name="profile_photo" type="file" id="profilePhotoInput" class="file-input" accept="image/*" onchange="uploadPhoto()">
                    </div>
                </div>
            </div>
            <hr>
            <div class="buttons">
                <button class="reset btn btn-light reset-btn" type="reset">
                    Reset
                </button>
                <button class="save btn btn-primary ml-2" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <script>
        // Simpan URL gambar profil awal
        let initialProfileImageUrl = document.getElementById('profileImage').src;

        function uploadPhoto() {
            const input = document.getElementById('profilePhotoInput');
            const profileImage = document.getElementById('profileImage');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    profileImage.src = e.target.result; // Pratinjau gambar baru
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Fungsi untuk mengatur ulang gambar profil dan input teks
        function resetProfileImage() {
            const profileImage = document.getElementById('profileImage');
            profileImage.src = initialProfileImageUrl; // Kembali ke gambar awal
            document.getElementById('profilePhotoInput').value = ""; // Kosongkan input file

            // Reset semua input teks ke nilai awal
            document.getElementById('name').value = "{{ old('name', auth()->user()->name) }}";
            document.getElementById('username').value = "{{ old('username', auth()->user()->username) }}";
            document.getElementById('email').value = "{{ old('email', auth()->user()->email) }}";
            document.getElementById('phone').value = "{{ old('phone', auth()->user()->phone) }}";
        }

        // Tambahkan event listener ke tombol reset untuk menjalankan resetProfileImage
        document.querySelector('.reset-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah reset form bawaan
            resetProfileImage();
        });
    </script>
@endsection
