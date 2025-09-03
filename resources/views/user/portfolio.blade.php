@extends('layouts.app')

@section('content')
<style>
    /* === PORTFOLIO PAGE STYLING === */
    .portfolio-section {
        padding: 120px 20px 80px;
        min-height: 100vh;
        background-color: #f9f9f9;
        color: #333;
        font-family: 'Poppins', sans-serif;
    }

    .portfolio-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .portfolio-title {
        font-size: 1.2rem;
        font-weight: 500;
        color: #7A7A7A;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .portfolio-subtitle {
        font-family: 'Times New Roman', Times, serif;
        font-size: 3.5rem;
        font-weight: 700;
        color: #333;
        margin: 0;
    }

    .portfolio-categories {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 50px;
    }

    .category-btn {
        background-color: #FFFFFF;
        color: #C5B358;
        border: 1px solid #C5B358;
        padding: 10px 25px;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
        font-size: 1rem;
        cursor: pointer;
    }
    
    .category-btn:hover {
        background-color: #C5B358;
        color: #FFFFFF;
    }
    
    .category-btn.active {
        background-color: #C5B358;
        color: #FFFFFF;
    }

    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }

    /* === ENHANCED PORTFOLIO ITEM STYLING === */
    .portfolio-item {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        background: linear-gradient(145deg, #ffffff, #f5f5f5);
        height: 280px;
        cursor: pointer;
    }

    .portfolio-item:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }
    
    .portfolio-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: all 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
        border-radius: 15px;
    }

    .portfolio-item:hover img {
        transform: scale(1.1);
        filter: brightness(0.8);
    }

    /* === PLUS BUTTON STYLING === */
    .portfolio-plus-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        width: 60px;
        height: 60px;
        background: rgba(197, 179, 88, 0.95);
        border: 3px solid #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        backdrop-filter: blur(10px);
        z-index: 10;
    }

    .portfolio-plus-btn::before,
    .portfolio-plus-btn::after {
        content: '';
        position: absolute;
        background-color: #ffffff;
        transition: all 0.3s ease;
    }

    .portfolio-plus-btn::before {
        width: 20px;
        height: 3px;
    }

    .portfolio-plus-btn::after {
        width: 3px;
        height: 20px;
    }

    .portfolio-item:hover .portfolio-plus-btn {
        transform: translate(-50%, -50%) scale(1);
    }

    .portfolio-plus-btn:hover {
        background: rgba(197, 179, 88, 1);
        transform: translate(-50%, -50%) scale(1.1);
        box-shadow: 0 8px 20px rgba(197, 179, 88, 0.4);
    }

    .portfolio-plus-btn:hover::before,
    .portfolio-plus-btn:hover::after {
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    /* === CARD OVERLAY EFFECT === */
    .portfolio-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
            135deg,
            rgba(197, 179, 88, 0.1) 0%,
            rgba(197, 179, 88, 0.3) 100%
        );
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 5;
        border-radius: 15px;
    }

    .portfolio-item:hover::before {
        opacity: 1;
    }

    /* === CARD BORDER ANIMATION === */
    .portfolio-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border: 2px solid transparent;
        border-radius: 15px;
        background: linear-gradient(45deg, #C5B358, transparent, #C5B358) border-box;
        -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: exclude;
        mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 8;
    }

    .portfolio-item:hover::after {
        opacity: 1;
    }
    
    /* === Golden Line Divider === */
    .golden-divider {
        width: 100px;
        height: 3px;
        background-color: #C5B358;
        margin: 30px auto;
        border-radius: 2px;
    }
    
    /* === Blog Post Specific Styling === */
    .blog-info, .testimonial-info, .wedding-info, .makeup-info {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .blog-info .blog-label, .testimonial-info .testimonial-label,
    .wedding-info .wedding-label, .makeup-info .makeup-label {
        background-color: #E0E0E0;
        color: #5D724F;
        padding: 8px 20px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 14px;
    }

    .blog-info .blog-title-main, .testimonial-info .testimonial-title-main,
    .wedding-info .wedding-title-main, .makeup-info .makeup-title-main {
        font-family: 'Times New Roman', Times, serif;
        font-size: 3.5rem;
        font-weight: 700;
        color: #333;
        margin: 0;
    }

    .blog-info h3 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.8rem;
        color: #C5B358;
        margin-top: 20px;
        margin-bottom: 5px;
    }

    .blog-info .blog-meta {
        font-size: 0.9rem;
        color: #888;
    }

    .blog-post-item {
        display: flex;
        flex-direction: column;
        background-color: white;
        padding: 20px;
        border: 2px solid #C5B358;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-radius: 10px;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .blog-post-item .blog-image {
        width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .blog-post-item .blog-content {
        text-align: left;
    }

    .blog-post-item p {
        font-size: 1rem;
        color: #555;
        line-height: 1.6;
    }

    .blog-post-item p.blog-paragraph {
        color: #C5B358;
        font-family: 'Times New Roman', Times, serif;
    }

    /* === Read More Link Styling === */
    .read-more-link {
        color: #C5B358;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .read-more-link:hover {
        color: #A89B47;
        text-decoration: underline;
    }
    
    /* === Testimonial Card Styling === */
    .testimonial-card-item {
        display: flex;
        flex-direction: column;
        background-color: white;
        padding: 30px;
        border: 2px solid #C5B358;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        max-width: 900px;
        margin: 0 auto;
        gap: 20px;
    }
    
    .testimonial-card-item .testimonial-image {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .testimonial-card-item .testimonial-content {
        text-align: left;
    }

    .testimonial-card-item .testimonial-name {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    .testimonial-card-item .testimonial-meta {
        font-size: 0.9rem;
        color: #888;
        margin-bottom: 15px;
    }

    .testimonial-card-item p {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
    }
    
    /* === PRICE SECTION STYLING (SEPARATE SECTION) === */
    .price-section {
        padding: 80px 20px;
        background-color: #ffffff;
        color: #333;
        font-family: 'Poppins', sans-serif;
    }

    .price-info {
        text-align: center;
        margin-bottom: 40px;
    }

    .price-info .price-label {
        background-color: #E0E0E0;
        color: #5D724F;
        padding: 8px 20px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 14px;
    }

    .price-info .price-title-main {
        font-family: 'Times New Roman', Times, serif;
        font-size: 3.5rem;
        font-weight: 700;
        color: #C5B358;
        margin: 0;
    }
    
    /* === Price Cards Styling === */
    .price-cards-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
    }

    .price-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        padding: 30px;
        width: 320px;
        text-align: center;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: 2px solid transparent;
        position: relative;
        background: linear-gradient(145deg, #ffffff, #f8f8f8);
    }

    .price-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        border-color: #C5B358;
    }
    
    .price-card-header {
        padding-bottom: 20px;
        margin-bottom: 20px;
        border-bottom: 2px solid #C5B358;
    }

    .price-card-header h3 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 2rem;
        color: #C5B358;
        margin: 0;
    }

    .price-card-body ul {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: left;
        color: #555;
        font-size: 1rem;
    }

    .price-card-body ul li {
        margin-bottom: 10px;
        position: relative;
        padding-left: 20px;
    }

    .price-card-body ul li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #C5B358;
        font-weight: bold;
    }

    .price-card-footer {
        margin-top: 20px;
    }

    .price-card-footer .price-value {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.5rem;
        font-weight: bold;
        color: #C5B358;
    }

    /* === NEW STYLING FOR 'PILIH PAKET' BUTTON === */
    .select-package-btn {
        width: 60px;
        height: 60px;
        background: #C5B358;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px auto 0;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, background-color 0.3s ease;
        border: 2px solid #C5B358;
    }

    .select-package-btn::before,
    .select-package-btn::after {
        content: '';
        position: absolute;
        background-color: #ffffff;
        transition: all 0.3s ease;
    }

    .select-package-btn::before {
        width: 24px;
        height: 3px;
    }

    .select-package-btn::after {
        width: 3px;
        height: 24px;
    }

    .select-package-btn:hover {
        background-color: #a89b47;
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .select-package-btn:hover::before,
    .select-package-btn:hover::after {
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }
    /* === END OF NEW STYLING === */

    /* === MODAL STYLING === */
    .image-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(5px);
    }

    .modal-content {
        position: relative;
        margin: auto;
        display: block;
        width: 90%;
        max-width: 800px;
        max-height: 90%;
        object-fit: contain;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .modal-close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .modal-close:hover {
        opacity: 0.7;
    }

    @media (min-width: 768px) {
        .testimonial-card-item {
            flex-direction: row;
        }
        .testimonial-card-item .testimonial-image {
            width: 40%;
        }
        .testimonial-card-item .testimonial-content {
            width: 60%;
        }
        
        .blog-post-item {
            flex-direction: row;
            gap: 30px;
        }
        .blog-post-item .blog-image {
            width: 50%;
            height: auto;
        }
        .blog-post-item .blog-content {
            width: 50%;
        }
    }
    
    @media (max-width: 768px) {
        .portfolio-subtitle {
            font-size: 2.5rem;
        }
        .portfolio-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .portfolio-item {
            height: 250px;
        }
        .wedding-info .wedding-title-main,
        .makeup-info .makeup-title-main {
            font-size: 2.5rem;
        }
        .price-info .price-title-main {
            font-size: 2.5rem;
        }
        .price-card {
            width: 100%;
            max-width: 300px;
        }
    }
</style>

<section class="portfolio-section">
    <div class="container">
        <div class="portfolio-header">
            <span class="portfolio-title">Portofolio</span>
            <h2 class="portfolio-subtitle">Portofolio Kami</h2>
        </div>
        
        <div class="portfolio-categories">
            <a href="#" class="category-btn active" data-category="wedding">Wedding</a>
            <a href="#" class="category-btn" data-category="makeup-artist">Makeup Artist</a>
            <a href="#" class="category-btn" data-category="blog">Blog</a>
            <a href="#" class="category-btn" data-category="testimoni">Testimoni</a>
        </div>
        
        <div id="wedding-content-container" style="display: block;">
            <div class="wedding-info">
                <span class="wedding-label">Wedding</span>
                <h2 class="wedding-title-main">Galeri Wedding Kami</h2>
            </div>
            <div class="golden-divider"></div>
        </div>

        <div id="makeup-content-container" style="display: none;">
            <div class="makeup-info">
                <span class="makeup-label">Makeup Artist</span>
                <h2 class="makeup-title-main">Portfolio Makeup Artist</h2>
            </div>
            <div class="golden-divider"></div>
        </div>
        
        <div id="blog-content-container" style="display: none;">
            <div class="blog-info">
                <span class="blog-label">Blog</span>
                <h2 class="blog-title-main">Wedding Blog</h2>
                <div class="golden-divider"></div>
                <h3>
                    Menyiapkan Diri Sebelum Menikah: Tips dan Trik <br>
                    untuk Perempuan agar Pernikahan Bahagia
                </h3>
                <p class="blog-meta">Jumat, 24 Mei 2024 | 10.47 WIB</p>
            </div>
            <div class="blog-post-item">
                <img src="{{ asset('assets/img/imgportfolio/img-blog.jpg') }}" alt="Pasangan Berpegangan Tangan" class="blog-image">
                <div class="blog-content">
                    <p class="blog-paragraph">
                        Menikah merupakan ibadah yang sangat dianjurkan oleh Rasulullah Saw bagi mereka yang memiliki kemampuan untuk melaksanakannya. Salah satu cita-cita pernikahan dalam Islam adalah pernikahan yang sakinah, mawaddah, warahmah. Namun demikian, untuk mewujudkannya tentu diperlukan usaha atau persiapan yang matang dan perlu disiapkan... <br><br>
                        <a href="#price-section" class="read-more-link" id="read-more-btn">Baca selengkapnya</a>
                    </p>
                </div>
            </div>
        </div>

        <div id="testimoni-content-container" style="display: none;">
            <div class="testimonial-info">
                <span class="testimonial-label">Testimoni</span>
                <h2 class="testimonial-title-main">Testimoni Klien Kami</h2>
                <div class="golden-divider"></div>
            </div>
            <div class="testimonial-card-item">
                <img src="{{ asset('assets/img/imgportfolio/img-testimoni.webp') }}" alt="Foto Testimoni Jessica & Michael" class="testimonial-image">
                <div class="testimonial-content">
                    <h3 class="testimonial-name">Jessica & Michael Wedding</h3>
                    <p class="testimonial-meta">11 April 2024</p>
                    <p>
                        "Kesan pertama kali menggunakan jasa layanan wedding organizer di Sthreek sangat memuaskan, terutama di acara sekali seumur hidup kami. Semua service yang diberikan dari pihak Sthreek maksimal banget mulai dari H- jauh jauh hari sampai ke hari H-nya semua tertata secara sistematis. Itu yang bikin kita betah sih pake jasa layanan dari Sthreek, apalagi dengan harga yang ramah budget dan bisa disesuaikan dengan apa yang kami minta. Thank you Sthreek Wedding Organizer!" - Jessica & Michael.
                    </p>
                </div>
            </div>
        </div>

        <div id="photo-grid-container" class="portfolio-grid">
            <div class="portfolio-item wedding-item">
                <img src="{{ asset('assets/img/imgportfolio/wedding-1.jpg') }}" alt="Foto Wedding 1">
                <div class="portfolio-plus-btn"></div>
            </div>
            <div class="portfolio-item wedding-item">
                <img src="{{ asset('assets/img/imgportfolio/wedding-2.jpg') }}" alt="Foto Wedding 2">
                <div class="portfolio-plus-btn"></div>
            </div>
            <div class="portfolio-item wedding-item">
                <img src="{{ asset('assets/img/imgportfolio/wedding-3.jpg') }}" alt="Foto Wedding 3">
                <div class="portfolio-plus-btn"></div>
            </div>
            <div class="portfolio-item wedding-item">
                <img src="{{ asset('assets/img/imgportfolio/wedding-4.jpg') }}" alt="Foto Wedding 4">
                <div class="portfolio-plus-btn"></div>
            </div>
            <div class="portfolio-item wedding-item">
                <img src="{{ asset('assets/img/imgportfolio/wedding-5.jpg') }}" alt="Foto Wedding 5">
                <div class="portfolio-plus-btn"></div>
            </div>

            <div class="portfolio-item makeup-artist-item" style="display: none;">
                <img src="{{ asset('assets/img/imgportfolio/makeup-artist-1.jpg') }}" alt="Foto Makeup Artist 1">
                <div class="portfolio-plus-btn"></div>
            </div>
            <div class="portfolio-item makeup-artist-item" style="display: none;">
                <img src="{{ asset('assets/img/imgportfolio/makeup-artist-2.jpg') }}" alt="Foto Makeup Artist 2">
                <div class="portfolio-plus-btn"></div>
            </div>
            <div class="portfolio-item makeup-artist-item" style="display: none;">
                <img src="{{ asset('assets/img/imgportfolio/makeup-artist-3.jpg') }}" alt="Foto Makeup Artist 3">
                <div class="portfolio-plus-btn"></div>
            </div>
            <div class="portfolio-item makeup-artist-item" style="display: none;">
                <img src="{{ asset('assets/img/imgportfolio/makeup-artist-4.jpg') }}" alt="Foto Makeup Artist 4">
                <div class="portfolio-plus-btn"></div>
            </div>
            <div class="portfolio-item makeup-artist-item" style="display: none;">
                <img src="{{ asset('assets/img/imgportfolio/makeup-artist-5.jpg') }}" alt="Foto Makeup Artist 5">
                <div class="portfolio-plus-btn"></div>
            </div>
        </div>
    </div>
</section>

<section id="price-section" class="price-section">
    <div class="container">
        <div class="price-info">
            <span class="price-label">Price</span>
            <h2 class="price-title-main">Harga Paket Layanan</h2>
            <div class="golden-divider"></div>
        </div>
        <div class="price-cards-container">
            <div class="price-card">
                <div class="price-card-header">
                    <h3>Paket Silver</h3>
                </div>
                <div class="price-card-body">
                    <ul>
                        <li>Dekorasi minimalis dan elegan</li>
                        <li>Tata rias untuk pengantin dan rias pendamping</li>
                        <li>Hair do / hijab untuk ibu mempelai</li>
                    </ul>
                </div>
                <div class="price-card-footer">
                    <span class="price-value">IDR 8.000.000</span>
                    <a href="{{ route('checkout', ['package' => 'silver']) }}" class="select-package-btn"></a>
                </div>
            </div>

            <div class="price-card">
                <div class="price-card-header">
                    <h3>Paket Platinum</h3>
                </div>
                <div class="price-card-body">
                    <ul>
                        <li>Dekorasi elegan sesuai tema pilihan</li>
                        <li>Tata rias untuk pengantin dan rias pendamping</li>
                        <li>Hair do / hijab untuk 2 orang</li>
                        <li>Hair do / hijab untuk ibu mempelai</li>
                    </ul>
                </div>
                <div class="price-card-footer">
                    <span class="price-value">IDR 11.000.000</span>
                    <a href="{{ route('checkout', ['package' => 'platinum']) }}" class="select-package-btn"></a>
                </div>
            </div>

            <div class="price-card">
                <div class="price-card-header">
                    <h3>Paket Gold</h3>
                </div>
                <div class="price-card-body">
                    <ul>
                        <li>Dekorasi elegan dengan tema khusus</li>
                        <li>Tata rias untuk pengantin dan rias pendamping</li>
                        <li>Hair do / hijab untuk 3 orang</li>
                        <li>Tata rias untuk ibu mempelai</li>
                    </ul>
                </div>
                <div class="price-card-footer">
                    <span class="price-value">IDR 15.000.000</span>
                    <a href="{{ route('checkout', ['package' => 'gold']) }}" class="select-package-btn"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="imageModal" class="image-modal">
    <span class="modal-close">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-btn');
        const photoGridContainer = document.getElementById('photo-grid-container');
        const blogContentContainer = document.getElementById('blog-content-container');
        const testimoniContentContainer = document.getElementById('testimoni-content-container');
        const weddingContentContainer = document.getElementById('wedding-content-container');
        const makeupContentContainer = document.getElementById('makeup-content-container');
        const readMoreBtn = document.getElementById('read-more-btn');

        // Modal functionality
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeModal = document.querySelector('.modal-close');

        // Function to filter and show content based on category
        function filterContent(category) {
            // Hide all content containers first
            photoGridContainer.style.display = 'none';
            blogContentContainer.style.display = 'none';
            testimoniContentContainer.style.display = 'none';
            weddingContentContainer.style.display = 'none';
            makeupContentContainer.style.display = 'none';

            // Show the relevant content container based on category
            if (category === 'blog') {
                blogContentContainer.style.display = 'block';
            } else if (category === 'testimoni') {
                testimoniContentContainer.style.display = 'block';
            } else if (category === 'wedding') {
                weddingContentContainer.style.display = 'block';
                photoGridContainer.style.display = 'grid';
                const portfolioItems = document.querySelectorAll('.portfolio-item');
                
                // Hide all portfolio items in the grid
                portfolioItems.forEach(item => item.style.display = 'none');
                
                // Show items for the selected photo category
                document.querySelectorAll(`.${category}-item`).forEach(item => {
                    item.style.display = 'block';
                });
            } else if (category === 'makeup-artist') {
                makeupContentContainer.style.display = 'block';
                photoGridContainer.style.display = 'grid';
                const portfolioItems = document.querySelectorAll('.portfolio-item');
                
                // Hide all portfolio items in the grid
                portfolioItems.forEach(item => item.style.display = 'none');
                
                // Show items for the selected photo category
                document.querySelectorAll(`.${category}-item`).forEach(item => {
                    item.style.display = 'block';
                });
            }
        }

        // Add click event listener to each category button
        categoryButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove 'active' class from all buttons
                categoryButtons.forEach(btn => btn.classList.remove('active'));

                // Add 'active' class to the clicked button
                this.classList.add('active');

                // Get the category from the data-category attribute
                const category = this.getAttribute('data-category');

                // Filter the content
                filterContent(category);
            });
        });

        // Add click event listener to "Baca selengkapnya" link
        readMoreBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Scroll to price section
            document.getElementById('price-section').scrollIntoView({ 
                behavior: 'smooth' 
            });
        });

        // Add click event listeners to plus buttons and portfolio items
        document.addEventListener('click', function(e) {
            const portfolioItem = e.target.closest('.portfolio-item');
            if (portfolioItem) {
                const img = portfolioItem.querySelector('img');
                if (img) {
                    modal.style.display = 'block';
                    modalImg.src = img.src;
                    modalImg.alt = img.alt;
                }
            }
        });

        // Close modal when clicking the X button
        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        // Close modal when clicking outside the image
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                modal.style.display = 'none';
            }
        });

        // Initial content display on page load (wedding)
        filterContent('wedding');
    });
</script>
@endsection