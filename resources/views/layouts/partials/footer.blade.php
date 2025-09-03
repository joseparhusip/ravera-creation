<style>
    /* New Styles for a more elegant footer */
    .footer {
        background-color: #1a1a1a;
        color: #e0e0e0;
        padding: 80px 20px;
        font-family: 'Montserrat', sans-serif;
        line-height: 1.8;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
        /* Updated: Increased the gap significantly for better spacing */
        column-gap: 100px; /* Jarak antar kolom */
        row-gap: 40px;
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
        font-weight: 700;
        margin-bottom: 25px;
        position: relative;
    }
    
    .footer-column h3::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 50px;
        height: 2px;
        background-color: #C5B358;
    }

    .footer-column p, .footer-column li, .footer-column a {
        font-size: 0.95rem;
        color: #b0b0b0;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-column a {
        text-decoration: none;
        transition: color 0.3s ease;
        padding: 5px 0;
        display: block;
    }

    .footer-column a:hover {
        color: #ffffff;
    }
    
    .social-icons {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }

    .social-icons a {
        color: #b0b0b0;
        font-size: 1.5rem;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: #ffffff;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 80px;
        padding-top: 30px;
        border-top: 1px solid #333;
        font-size: 0.9rem;
        color: #888;
    }

    /* --- SKELETON LOADING STYLES (MATCHING NEW THEME) --- */
    .skeleton {
        background-color: #2b2b2b;
        background-image: linear-gradient(90deg, #2b2b2b 0px, #3a3a3a 40px, #2b2b2b 80px);
        background-size: 200% 100%;
        animation: skeleton-loading 1.5s infinite linear;
        border-radius: 4px;
    }

    @keyframes skeleton-loading {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }

    .skeleton-text {
        height: 14px;
        margin-bottom: 12px;
    }

    .skeleton-text-short {
        width: 60%;
    }
</style>

<footer class="footer">
    <div class="footer-container" id="footer-container">
        {{-- Skeleton Loading --}}
        <div id="footer-skeleton">
            <div class="footer-column">
                <div class="skeleton-text" style="width: 80%;"></div>
                <div class="skeleton-text" style="width: 100%;"></div>
                <div class="skeleton-text" style="width: 90%;"></div>
            </div>
            <div class="footer-column">
                <div class="skeleton-text" style="width: 60%;"></div>
                <div class="skeleton-text" style="width: 80%;"></div>
                <div class="skeleton-text" style="width: 70%;"></div>
                <div class="skeleton-text" style="width: 90%;"></div>
            </div>
            <div class="footer-column">
                <div class="skeleton-text" style="width: 70%;"></div>
                <div class="skeleton-text" style="width: 90%;"></div>
                <div class="skeleton-text" style="width: 80%;"></div>
            </div>
            <div class="footer-column">
                <div class="skeleton-text" style="width: 50%;"></div>
                <div class="skeleton-text" style="width: 70%;"></div>
                <div class="skeleton-text" style="width: 60%;"></div>
            </div>
        </div>

        {{-- Footer Content (Hidden by default) --}}
        <div id="footer-content" style="display: none;">
            <div class="footer-column">
                <h3>RAVERA</h3>
                <p>Ravera adalah vendor pernikahan profesional yang siap membantu mewujudkan pernikahan impian Anda. Kami menyediakan berbagai layanan mulai dari dekorasi, tata rias, hingga pendampingan.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Layanan Kami</h3>
                <ul>
                    <li><a href="#">Paket Silver</a></li>
                    <li><a href="#">Paket Platinum</a></li>
                    <li><a href="#">Paket Gold</a></li>
                    <li><a href="#">Dekorasi</a></li>
                    <li><a href="#">Tata Rias</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Informasi</h3>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Hubungi Kami</h3>
                <p>Jalan Proklamasi No. 17A<br>Jakarta Pusat, 10320<br>Indonesia</p>
                <p>Email: info@raveracreative.com<br>Telepon: +62 812-3456-7890</p>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Ravera Creation. Hak Cipta Dilindungi.
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const skeleton = document.getElementById('footer-skeleton');
        const content = document.getElementById('footer-content');

        setTimeout(function() {
            skeleton.style.display = 'none';
            content.style.display = 'flex';
        }, 2000); // Durasi loading 2 detik
    });
</script>