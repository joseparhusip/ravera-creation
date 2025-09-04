@extends('layouts.app')

@section('content')
{{-- PENTING: Link ke library Swiper.js --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
    /* === SKELETON LOADING STYLES === */
    .skeleton {
        background-color: #e0e0e0; 
        background-image: linear-gradient(90deg, #e0e0e0 0px, #f5f5f5 40px, #e0e0e0 80px);
        background-size: 200% 100%;
        animation: skeleton-loading 1.5s infinite linear;
        border-radius: 6px;
        opacity: 0.7;
    }
    @keyframes skeleton-loading {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    /* === SLIDER & CONTENT STYLES === */
    
    /* PERBAIKAN: Kontainer utama sekarang menjadi bagian dari aliran halaman, bukan fixed */
    .hero-container {
        height: 100vh; /* Tetap setinggi layar */
        width: 100%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* PERBAIKAN: Hapus 'position: fixed' agar halaman bisa di-scroll */
    .swiper {
        width: 100%;
        height: 100%;
        position: absolute; /* Mengisi hero-container, tidak lagi mengunci viewport */
        top: 0;
        left: 0;
    }

    .swiper-slide {
        text-align: center;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    .swiper-slide::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    /* Menetapkan 4 gambar untuk 4 slide */
    .slide-1 { background-image: url("{{ asset('assets/img/bg-home.jpg') }}"); }
    .slide-2 { background-image: url("{{ asset('assets/img/bg-home-1.jpg') }}"); }
    .slide-3 { background-image: url("{{ asset('assets/img/bg-home-2.jpg') }}"); }
    .slide-4 { background-image: url("{{ asset('assets/img/bg-home-3.jpg') }}"); }

    .slide-content {
        position: relative;
        z-index: 2;
    }

    h1 {
        font-size: 4rem;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    p {
        font-size: 1.5rem;
        margin-top: 0;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }
    .btn-start {
        padding: 15px 40px;
        border: 2px solid white;
        background-color: transparent;
        color: white;
        font-size: 1rem;
        cursor: pointer;
        border-radius: 30px;
        margin-top: 20px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    .btn-start:hover {
        background-color: white;
        color: black;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }
    
    /* Styling untuk titik navigasi (pagination) */
    .swiper-pagination-bullet {
        background-color: rgba(255, 255, 255, 0.5);
        width: 10px; height: 10px;
    }
    .swiper-pagination-bullet-active {
        background-color: white;
    }

    /* BARU: Styling untuk panah navigasi */
    .swiper-button-next,
    .swiper-button-prev {
        color: white !important; /* Memastikan warna panah putih dan terlihat */
        --swiper-navigation-size: 30px; /* Mengatur ukuran panah */
    }

    /* SKELETON STYLING */
    #home-skeleton {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        position: relative;
        z-index: 5;
    }
    .skeleton-title { width: 60%; height: 4rem; margin-bottom: 20px; }
    .skeleton-text { width: 45%; height: 1.5rem; margin-bottom: 35px; }
    .skeleton-button { width: 150px; height: 50px; border-radius: 30px; }
    
    /* RESPONSIVE */
    @media (max-width: 768px) {
        h1 { font-size: 2.5rem; }
        p { font-size: 1.2rem; padding: 0 20px; }
        .btn-start { padding: 12px 30px; font-size: 0.9rem; }
        .skeleton-title { height: 2.5rem; }
        .skeleton-text { height: 1.2rem; }
    }

    /* BARU: Contoh konten di bawah slider untuk demo scrolling */
    .content-bawah {
        padding: 100px 50px;
        background-color: #f8f9fa;
        text-align: center;
    }
    .content-bawah h2 { font-size: 2.5rem; }
</style>

{{-- Ganti nama .main-container menjadi .hero-container --}}
<div class="hero-container">
    <div id="home-skeleton">
        <div class="skeleton skeleton-title"></div>
        <div class="skeleton skeleton-text"></div>
        <div class="skeleton skeleton-button"></div>
    </div>

    <div class="swiper" id="home-slider" style="opacity: 0; transition: opacity 0.5s ease-in;">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-1">
                <div class="slide-content">
                    <h1>Welcome to Ravera Creation</h1>
                    <p>Solution Wedding Organizer and Make Up Artist</p>
                    <a href="{{ route('tentang') }}" class="btn-start">MULAI</a>
                </div>
            </div>
            <div class="swiper-slide slide-2">
                 <div class="slide-content">
                    <h1>Your Perfect Day, Planned</h1>
                    <p>Unforgettable moments crafted with care.</p>
                    <a href="{{ route('tentang') }}" class="btn-start">MULAI</a>
                </div>
            </div>
            <div class="swiper-slide slide-3">
                 <div class="slide-content">
                    <h1>Stunning Make Up Artistry</h1>
                    <p>Look your absolute best on your special day.</p>
                    <a href="{{ route('tentang') }}" class="btn-start">MULAI</a>
                </div>
            </div>
            <div class="swiper-slide slide-4">
                <div class="slide-content">
                   <h1>Flawless Event Coordination</h1>
                   <p>From start to finish, we handle everything.</p>
                   <a href="{{ route('tentang') }}" class="btn-start">MULAI</a>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const homeSkeleton = document.getElementById('home-skeleton');
        const homeSlider = document.getElementById('home-slider');

        setTimeout(() => {
            if(homeSkeleton && homeSlider) {
                homeSkeleton.style.transition = 'opacity 0.5s ease-out';
                homeSkeleton.style.opacity = '0';

                setTimeout(() => {
                    homeSkeleton.style.display = 'none';
                    homeSlider.style.opacity = '1';
                    
                    const swiper = new Swiper('.swiper', {
                        loop: true,
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                        effect: 'fade',
                        fadeEffect: {
                            crossFade: true
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        // BARU: Mengaktifkan modul navigasi panah
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    });
                }, 500);
            }
        }, 1500);
    });
</script>
@endsection