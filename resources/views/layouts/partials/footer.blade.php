<style>
    /* Enhanced Elegant Footer */
    .footer {
        background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
        color: #e0e0e0;
        padding: 80px 20px;
        font-family: 'Montserrat', sans-serif;
        line-height: 1.8;
        position: relative;
        overflow: hidden;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, #C5B358, transparent);
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
        column-gap: 100px;
        row-gap: 50px;
        position: relative;
        z-index: 2;
    }

    .footer-column {
        flex: 1;
        min-width: 200px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .footer-column h3 {
        color: #C5B358;
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 30px;
        position: relative;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    
    .footer-column h3::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -12px;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #C5B358, #FFD700);
        border-radius: 2px;
        box-shadow: 0 2px 10px rgba(197, 179, 88, 0.3);
    }

    .footer-column p, .footer-column li, .footer-column a {
        font-size: 0.95rem;
        color: #b8b8b8;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-column li {
        margin-bottom: 12px;
    }

    .footer-column a {
        text-decoration: none;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 8px 0;
        display: block;
        position: relative;
    }

    .footer-column a:hover {
        color: #ffffff;
        padding-left: 12px;
        transform: translateX(3px);
    }

    .footer-column a:hover::before {
        content: '✦';
        position: absolute;
        left: -8px;
        color: #C5B358;
        transition: all 0.35s ease;
        animation: sparkle 1s infinite;
    }

    @keyframes sparkle {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.7; transform: scale(1.2); }
    }
    
    .social-icons {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }

    .social-icons a {
        color: #999;
        font-size: 1.3rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .social-icons a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(197, 179, 88, 0.3), transparent);
        transition: left 0.5s;
    }

    .social-icons a:hover::before {
        left: 100%;
    }

    .social-icons a:hover {
        color: #ffffff;
        background: linear-gradient(135deg, #C5B358, #FFD700);
        transform: translateY(-4px) scale(1.1);
        box-shadow: 0 8px 25px rgba(197, 179, 88, 0.4);
    }

    .contact-info .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        color: #c0c0c0;
    }
    .contact-info .contact-item i {
        color: #C5B358;
        margin-right: 15px;
        margin-top: 5px;
        width: 16px; 
        text-align: center;
    }
    .contact-info .contact-item a {
        color: #b8b8b8;
        padding: 0;
        display: inline;
    }
    .contact-info .contact-item a:hover {
        color: #ffffff;
        padding-left: 0;
        transform: none;
    }
    .contact-info .contact-item a:hover::before {
        content: none;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 80px;
        padding-top: 35px;
        border-top: 2px solid #2a2a2a;
        font-size: 0.9rem;
        color: #999;
        position: relative;
    }

    .footer-bottom::before {
        content: '';
        position: absolute;
        top: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 2px;
        background: linear-gradient(90deg, #C5B358, #FFD700);
    }

    .footer-skeleton .skeleton {
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 25%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.1) 75%);
        background-size: 200px 100%;
        animation: skeleton-loading 1.5s infinite linear;
        border-radius: 6px;
    }

    @keyframes skeleton-loading {
        0% {
            background-position: -200px 0;
        }
        100% {
            background-position: calc(200px + 100%);
        }
    }

    .footer-skeleton .skeleton-text {
        height: 16px;
        margin-bottom: 14px;
    }

    /* === PERUBAHAN UNTUK MOBILE LAYOUT 2x1 === */
    @media (max-width: 768px) {
        /* Menggunakan CSS Grid untuk layout yang lebih fleksibel */
        #footer-content .footer-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Membuat 2 kolom yang sama besar */
            gap: 50px 20px; /* Jarak vertikal dan horizontal antar item */
        }
        
        /* Membuat kolom ke-3 (Hubungi Kami) mengambil 2 span kolom */
        #footer-content .footer-column:nth-of-type(3) {
            grid-column: 1 / -1; /* Span dari kolom pertama hingga terakhir */
        }
    }

    @media (max-width: 480px) {
        .footer { padding: 60px 15px; }
        .footer-column h3 { font-size: 1.2rem; }
        .social-icons a { width: 42px; height: 42px; font-size: 1.3rem; }

        /* Pada layar sangat kecil, kembali ke 1 kolom agar tidak sempit */
        #footer-content .footer-container {
            grid-template-columns: 1fr; /* Kembali menjadi 1 kolom */
        }
    }
</style>

<footer class="footer">
    <div class="footer-container" id="footer-container">
        <div id="footer-skeleton" class="footer-skeleton" style="display: flex; justify-content: space-between; flex-wrap: wrap; width: 100%; column-gap: 100px;">
            <div class="footer-column">
                <div class="skeleton skeleton-text" style="width: 60%; height: 20px; margin-bottom: 30px;"></div>
                <div class="skeleton skeleton-text" style="width: 80%;"></div>
                <div class="skeleton skeleton-text" style="width: 70%;"></div>
                <div class="skeleton skeleton-text" style="width: 90%;"></div>
                <div class="skeleton skeleton-text" style="width: 75%;"></div>
            </div>
            <div class="footer-column">
                <div class="skeleton skeleton-text" style="width: 70%; height: 20px; margin-bottom: 30px;"></div>
                <div class="skeleton skeleton-text" style="width: 90%;"></div>
                <div class="skeleton skeleton-text" style="width: 80%;"></div>
                <div class="skeleton skeleton-text" style="width: 85%;"></div>
            </div>
            <div class="footer-column">
                <div class="skeleton skeleton-text" style="width: 50%; height: 20px; margin-bottom: 30px;"></div>
                <div class="skeleton skeleton-text" style="width: 70%;"></div>
                <div class="skeleton skeleton-text" style="width: 60%;"></div>
                <div class="skeleton skeleton-text" style="width: 80%;"></div>
            </div>
        </div>

        <div id="footer-content" style="display: none; width: 100%;">
            <div class="footer-container">
                <div class="footer-column">
                    <h3>Layanan Kami</h3>
                    <ul>
                        <li><a href="#">Paket Silver</a></li>
                        <li><a href="#">Paket Gold</a></li>
                        <li><a href="#">Paket Platinum</a></li>
                        <li><a href="#">Dekorasi Premium</a></li>
                        <li><a href="#">Tata Rias Pengantin</a></li>
                        <li><a href="#">Dokumentasi</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Informasi</h3>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Testimoni</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Hubungi Kami</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jalan Proklamasi No. 17A<br>Jakarta Pusat, 10320<br>Indonesia</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:info@raveracreative.com">info@raveracreative.com</a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <a href="tel:+6281234567890">+62 812-3456-7890</a>
                        </div>
                    </div>
                    <div class="social-icons">
                        <a href="#" aria-label="Instagram" title="Follow us on Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="TikTok" title="Watch us on TikTok"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2025 Ravera Creation. Semua Hak Cipta Dilindungi Undang-Undang.
    </div>
</footer>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const skeleton = document.getElementById('footer-skeleton');
        const content = document.getElementById('footer-content');

        setTimeout(function() {
            if (skeleton) {
                skeleton.style.transition = 'opacity 0.5s ease-out';
                skeleton.style.opacity = '0';
                
                setTimeout(function() {
                    skeleton.style.display = 'none';
                    if(content) {
                        content.style.display = 'contents';
                        content.style.opacity = '0';
                        
                        setTimeout(function() {
                            content.style.transition = 'opacity 0.6s ease-in';
                            content.style.opacity = '1';
                        }, 50);
                    }
                }, 500);
            }
        }, 1800);
    });
</script>