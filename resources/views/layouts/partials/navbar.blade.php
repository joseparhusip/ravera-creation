{{-- GABUNGAN HTML, CSS, DAN JAVASCRIPT UNTUK NAVBAR --}}

<style>
    /* === MAIN NAVBAR STYLING === */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        box-sizing: border-box;
        z-index: 1000;
        min-height: 80px;
        display: flex;
        align-items: center;
        padding: 0 50px;
        background-color: #FFFFFF; /* Latar belakang putih */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Tambahkan sedikit shadow untuk definisi */
        transition: all 0.3s ease;
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .nav-logo {
        font-size: 1.8rem;
        font-weight: bold;
        color: #000000; /* Warna teks hitam */
        text-decoration: none;
        letter-spacing: 2px;
    }

    /* === MENU STYLING (DESKTOP) === */
    .nav-menu {
        list-style: none;
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
        gap: 40px;
    }

    .nav-link {
        color: #000000; /* Warna teks hitam */
        text-decoration: none;
        font-size: 1rem;
        padding-bottom: 5px;
        position: relative;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #555555; /* Warna teks saat hover (abu-abu gelap) */
    }

    .nav-link.active {
        font-weight: 600;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #000000; /* Garis bawah hitam untuk link aktif */
    }

    /* === USER ICON (DESKTOP) === */
    .nav-user {
        display: block;
    }
    .nav-user a {
        color: #000000; /* Warna ikon hitam */
        transition: color 0.3s ease;
    }
    .nav-user a:hover {
        color: #555555; /* Warna ikon saat hover */
    }
    .nav-user-mobile {
        display: none;
    }

    /* === HAMBURGER & MOBILE MENU STYLING === */
    .nav-toggle {
        color: #000000; /* Warna ikon hamburger hitam */
        display: none;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .nav-toggle:hover {
        color: #555555; /* Warna ikon hamburger saat hover */
    }

    @media (max-width: 992px) {
        .navbar {
            padding: 0 25px;
            min-height: 70px;
        }
        .nav-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 70%;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.95); /* Latar belakang menu mobile semi-transparan putih */
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 30px;
            transition: left 0.4s ease-in-out;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .nav-menu.active {
            left: 0;
        }

        .nav-link {
            font-size: 1.2rem;
            color: #000000; /* Pastikan teks di menu mobile juga hitam */
        }

        .nav-toggle {
            display: block;
        }

        .nav-user {
            display: none;
        }

        .nav-user-mobile {
            display: block;
            margin-top: 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.2); /* Garis pemisah di menu mobile */
            width: 80%;
            text-align: center;
            padding-top: 30px;
        }
    }
</style>

<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="/" class="nav-logo">RAVERA</a>

        <div class="nav-toggle" id="nav-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </div>

        <ul class="nav-menu" id="nav-menu">
            <li><a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Utama</a></li>
            <li><a href="{{ route('tentang') }}" class="nav-link {{ Request::is('tentang') ? 'active' : '' }}">Tentang</a></li>
            <li><a href="{{ route('layanan') }}" class="nav-link {{ Request::is('layanan') ? 'active' : '' }}">Layanan</a></li>
<li>
    <a href="{{ route('portfolio') }}" class="nav-link {{ Request::is('portfolio') ? 'active' : '' }}">Portfolio</a>
</li>
            <li>
                <a href="#" class="nav-link">
                    Kontak
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-user-mobile">
                <a href="#" class="nav-link">Profile</a>
            </li>
        </ul>

        <div class="nav-user">
            <a href="#" aria-label="User Profile">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');
        const navbar = document.getElementById('navbar');

        if (navToggle && navMenu) {
            navToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
            });

            const navLinks = navMenu.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navMenu.classList.remove('active');
                });
            });

            document.addEventListener('click', function(e) {
                if (!navMenu.contains(e.target) && !navToggle.contains(e.target)) {
                    navMenu.classList.remove('active');
                }
            });
        }
    });
</script>