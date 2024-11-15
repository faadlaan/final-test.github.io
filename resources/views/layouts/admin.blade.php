<html>

<head>
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0/css/all.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/dash.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="sidebar" id="sidebar">
        <a href="">
        <img alt="Company Logo" height="100"
            src="{{ asset('front/img/cool.png') }}"
            width="100" />
            <hr>
        <ul>
            <li>
                <a href="/dashboard">
                    <i class="fa-solid fa-table-columns"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('level') }}">
                    <i class="fa-solid fa-users"></i>
                    Level User
                </a>
            </li>
            <li>
                <a href="{{ route('user') }}">
                    <i class="fa-solid fa-user"></i>
                    User
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-book-atlas"></i>
                    Book
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    Deposit
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-brands fa-dashcube"></i>
                    Profiling
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-user-plus"></i>
                    Cek Kepribadian
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-regular fa-credit-card"></i>
                    Metode Pembayaran
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    Transaksi
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-brain"></i>
                    Brain Activation
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-ban"></i>
                    Blokir kata-kata
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-gear"></i>
                    Setting
                    <i class="set fa-solid fa-chevron-down"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="header" id="header">
        <div class="menu-icon" id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        
            <div class="user-info">
                <div class="bell">
                    <i class="fa-regular fa-bell"></i>
                </div>
                <div class="">
                    <a href="">
                        <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/default.webp') }}" alt="Foto Profil" width="40px" height="40px" >
                    </a>
                </div>
                <div class="abc">
                        <div class="dropdown">
                            <a style="border: none" class="dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                    
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();" style="color: black; text-decoration: none;">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    {{-- <a href="">
                        <span class="user-name">
                            Thomas Friend
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </a> --}}
                </div>
            </div>
            
    </div>
    <div class="content" id="content">
            @yield('content')
    </div>

    <script>
        document.getElementById('menu-icon').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var header = document.getElementById('header');
            var content = document.getElementById('content');
            sidebar.classList.toggle('hidden');
            header.classList.toggle('full-width');
            content.classList.toggle('full-width');
        });
    </script>
    

    {{-- dropdown profile --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
