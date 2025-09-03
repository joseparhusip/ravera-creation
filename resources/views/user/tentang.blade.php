@extends('layouts.app')

@section('content')
<style>
    /* === CSS KONTEN HALAMAN TENTANG === */
    .main-container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 20px;
        color: #C5B358;
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .page-header h1 {
        font-size: 2.5rem;
        margin-top: 10px;
        color: #C5B358;
    }

    .about-section {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
        min-height: 80vh;
    }

    .about-text {
        flex-basis: 50%;
        min-width: 300px;
    }

    .about-text h2 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 2.5rem;
        font-weight: normal;
        margin-bottom: 25px;
        line-height: 1.2;
    }
    .heading-line-2 {
        font-size: 3rem;
    }
    
    .about-text .text-dark {
        line-height: 1.6;
        color: #333;
        margin-bottom: 25px;
    }

    .about-text .btn-more {
        padding: 15px 40px;
        border: 2px solid #C5B358;
        background-color: transparent;
        color: #C5B358;
        font-size: 1rem;
        cursor: pointer;
        border-radius: 30px;
        margin-top: 20px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    .about-text .btn-more:hover {
        background-color: #C5B358;
        color: white;
    }

    .about-features {
        flex-basis: auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        max-width: 400px;
    }

    .feature-box {
        border: none;
        padding: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .feature-box img {
        width: 180px;
        height: auto;
    }

    .profile-section {
        padding: 100px 20px;
        color: white;
        position: relative;
        text-align: center;
        min-height: 600px;
        background: 
            linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
            url("/assets/img/bg-tentang.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    
    .profile-container {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    .profile-subtitle {
        display: inline-block;
        padding: 5px 15px;
        border: 1px solid white;
        border-radius: 20px;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }
    .profile-container h2 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 2.8rem;
        margin-top: 0;
        margin-bottom: 30px;
    }
    .profile-container p {
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 40px;
    }
    .social-media h3 {
        font-weight: normal;
        margin-bottom: 20px;
    }
    .social-media-icons a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        transition: color 0.3s ease;
    }
    .social-media-icons a:hover {
        color: #f0e68c;
    }
    .social-media-icons svg {
        width: 32px;
        height: 32px;
    }

    .interactive-line {
        position: fixed;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 4px;
        background: linear-gradient(90deg, #C5B358, #8B9548);
        border-radius: 2px;
        cursor: pointer;
        z-index: 1000;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(197, 179, 88, 0.3);
    }

    .interactive-line:hover {
        width: 250px;
        height: 6px;
        box-shadow: 0 4px 15px rgba(197, 179, 88, 0.5);
    }

    .interactive-line::before {
        content: '';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-top: 10px solid #C5B358;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .interactive-line:hover::before {
        opacity: 1;
    }

    .team-section {
        padding: 100px 20px;
        color: white;
        text-align: center;
        min-height: 100vh;
        background: 
            linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
            url("/assets/img/bg-tentang.jpg");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .team-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .team-container h2, .vision-mission-container h2 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 3rem;
        margin-bottom: 60px;
        color: white;
        padding-top: 30px;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 50px;
        margin-top: 60px;
    }

    .team-member {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        padding: 40px 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(197, 179, 88, 0.2);
    }

    .team-member:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(197, 179, 88, 0.2);
    }

    .team-member-photo {
        width: 250px;
        height: 250px;
        border-radius: 20px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #C5B358, #8B9548);
        overflow: hidden;
        border: 4px solid #C5B358;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .team-member-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .team-member h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #C5B358;
    }

    .team-member .role {
        color: #aaa;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .team-member p {
        line-height: 1.6;
        color: #ccc;
    }

    .vision-mission-section {
        padding: 100px 20px;
        color: white;
        text-align: center;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: 
            linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),
            url("/assets/img/bg-tentang.jpg");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .vision-mission-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .vision-mission-container h3 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 2.5rem;
        color: #C5B358;
        margin-top: 40px;
        margin-bottom: 20px;
    }

    .vision-mission-container p {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #e0e0e0;
        max-width: 700px;
        margin: 0 auto 40px auto;
    }

    .vision-mission-container ol {
        list-style: none;
        padding-left: 0;
        text-align: left;
        max-width: 700px;
        margin: 0 auto;
    }

    .vision-mission-container li {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #e0e0e0;
        margin-bottom: 20px;
        padding-left: 35px;
        position: relative;
    }

    .vision-mission-container li::before {
        content: '✓';
        position: absolute;
        left: 0;
        top: 0;
        color: #C5B358;
        font-size: 1.5rem;
        line-height: 1.2;
    }

    @media (max-width: 768px) {
        .main-container {
            padding-top: 20px;
        }
        .profile-section, .team-section, .vision-mission-section {
            background-attachment: scroll;
        }
        
        .interactive-line {
            width: 150px;
        }
        
        .interactive-line:hover {
            width: 180px;
        }
        
        .team-container h2, .vision-mission-container h2 {
            font-size: 2.2rem;
        }
        
        .team-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        .team-member-photo {
            width: 180px;
            height: 180px;
        }

        .vision-mission-container ol {
            text-align: center;
        }
    }
</style>

<div class="main-container">
    <header class="page-header">
        <h1>Pelajari Lainnya Tentang Kami</h1>
    </header>

    <section class="about-section">
        <div class="about-text">
            <h2>
                Kenapa Harus<br>
                <span class="heading-line-2">Ravera Creation?</span>
            </h2>
            
            <p class="text-dark">
                <strong>Ravera Creation</strong> adalah Wedding Organizer
                terpercaya yang membantu mewujudkan pernikahan
                impian anda secara elegan dan berkesan. Dengan tim
                profesional, layanan lengkap, dan konsep yang
                disesuaikan, kami hadir untuk mendampingi setiap
                proses hingga hari pernikahan berjalan lancar
                dan sempurna.
            </p>
            
            <a href="#profil-ravera" class="btn-more">TENTANG ></a>
        </div>
        <div class="about-features">
            <div class="feature-box">
                <img src="/assets/img/our-vision.png" alt="Our Vision Icon">
            </div>
            <div class="feature-box">
                <img src="/assets/img/our-mision.png" alt="Our Mission Icon">
            </div>
            <div class="feature-box">
                <img src="/assets/img/our-team.png" alt="Our Team Icon">
            </div>
            <div class="feature-box">
                <img src="/assets/img/contact.png" alt="Contact Icon">
            </div>
        </div>
    </section>
</div>

<section class="profile-section" id="profil-ravera">
    <div class="profile-container">
        <span class="profile-subtitle">Tentang</span>
        <h2>Profil Ravera Creation</h2>
        <p>
            <strong>Ravera Creation</strong> didirikan pada tahun 2025 sebagai hasil kolaborasi strategis dari beberapa brand, yaitu SThreeK Wedding Organizer, @dewisl MakeUp Artist, serta layanan tambahan berupa sound system berpengalaman. Dengan mengusung konsep brand mashup, Ravera Creation dirancang secara menyeluruh untuk menyatukan keunggulan dari masing-masing brand, sehingga dapat membantu klien dalam menciptakan wedding dreamers dan memberikan layanan pernikahan yang lengkap, modern, dan terpercaya dalam satu platform.
        </p>
        <div class="social-media">
            <h3>Our Social Media</h3>
            <div class="social-media-icons">
                <a href="#" aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.703.01 5.556 0 5.829 0 8s.01 2.444.048 3.297c.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.556 15.99 5.829 16 8 16s2.444-.01 3.297-.048c.852-.04 1.433-.174 1.942-.372.526-.205.972-.478 1.417-.923.445-.444.718-.891.923-1.417.198-.51.333-1.09.372-1.942C15.99 10.444 16 10.171 16 8s-.01-2.444-.048-3.297c-.04-.852-.174-1.433-.372-1.942a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.09-.333-1.942-.372C10.444.01 10.171 0 8 0zm0 1.442c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.282.24.705.275 1.486.039.843.047 1.096.047 3.232s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.486a2.5 2.5 0 0 1-.599.92c-.28.28-.546.453-.92.598-.282.11-.705.24-1.486.275-.843.039-1.096.047-3.232.047s-2.389-.008-3.232-.047c-.78-.035-1.203-.166-1.486-.275a2.5 2.5 0 0 1-.92-.599c-.28-.28-.453-.546-.598-.92-.11-.282-.24-.705-.275-1.486-.039-.843-.047-1.096-.047-3.232s.008-2.389.047-3.232c.035-.78.166-1.204.275-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.486-.275.843-.039 1.096-.047 3.232-.047zM8 4.865a3.135 3.135 0 1 0 0 6.27 3.135 3.135 0 0 0 0-6.27zM8 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm4.268-6.106a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
                    </svg>
                </a>
                <a href="#" aria-label="TikTok">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                        <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="interactive-line" id="scrollToTarget" title="Klik untuk melihat Visi & Misi Kami"></div>

<section class="team-section" id="our-team">
    <div class="team-container">
        <h2>Profil Tim Ravera Creation</h2>
        
        <div class="team-grid">
            <div class="team-member">
                <div class="team-member-photo">
                    <img src="/assets/img/ramdhani-oktavian.png" alt="Muhammad Ramdhani Oktafian" onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #C5B358, #8B9548) url(\'https://via.placeholder.com/250x250?text=Ramdhani\') no-repeat center center'; this.parentElement.style.backgroundSize='cover';">
                </div>
                <h3>Muhammad Ramdhani Oktafian</h3>
                <div class="role">Digital Marketer & UI/UX Designer</div>
                <p>Ahli dalam strategi digital marketing dan perancangan pengalaman pengguna yang memukau. Berpengalaman lebih dari 5 tahun dalam industri kreatif dengan fokus pada branding dan user experience.</p>
            </div>

            <div class="team-member">
                <div class="team-member-photo">
                    <img src="/assets/img/nia-yulandari.png" alt="Nia Yulandari" onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #C5B358, #8B9548) url(\'https://via.placeholder.com/250x250?text=Nia\') no-repeat center center'; this.parentElement.style.backgroundSize='cover';">
                </div>
                <h3>Nia Yulandari</h3>
                <div class="role">Account Manager & Data Analyst</div>
                <p>Spesialis dalam mengelola hubungan klien dan menganalisis data untuk mengoptimalkan layanan. Memiliki keahlian dalam project management dan business intelligence untuk memastikan kepuasan klien maksimal.</p>
            </div>
        </div>
    </div>
</section>

<section class="vision-mission-section" id="vision-mission">
    <div class="vision-mission-container">
        <h2>Visi & Misi Ravera Creation</h2>
        
        <h3>Visi</h3>
        <p>
            Menjadi platform inspiratif dan terpercaya dalam menghadirkan ide, solusi, serta layanan digital kreatif untuk mewujudkan momen pernikahan impian klien.
        </p>

        <h3>Misi</h3>
        <ol>
            <li>Memberikan jasa layanan yang unggul dengan kualitas terbaik dan harga terjangkau untuk membangun kepercayaan serta kepuasan klien.</li>
            <li>Menyediakan platform digital yang interaktif dan user-friendly untuk membantu calon klien dalam merencanakan pernikahan secara mudah dan efisien.</li>
            <li>Menghadirkan konten inspiratif seputar pernikahan melalui blog, portofolio digital, dan testimoni untuk memberikan referensi yang relevan dan menarik.</li>
        </ol>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollLine = document.getElementById('scrollToTarget');
        const targetSection = document.getElementById('vision-mission');
        
        if (scrollLine && targetSection) {
            scrollLine.addEventListener('click', function() {
                targetSection.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
                
                scrollLine.style.transform = 'translateX(-50%) scale(1.2)';
                setTimeout(() => {
                    scrollLine.style.transform = 'translateX(-50%) scale(1)';
                }, 200);
            });
            
            window.addEventListener('scroll', function() {
                const scrollPosition = window.scrollY;
                const windowHeight = window.innerHeight;
                const targetSectionTop = targetSection.offsetTop;
                
                if (scrollPosition + windowHeight >= targetSectionTop - 100) {
                    scrollLine.style.opacity = '0';
                    scrollLine.style.pointerEvents = 'none';
                } else {
                    scrollLine.style.opacity = '1';
                    scrollLine.style.pointerEvents = 'auto';
                }
            });
        }
    });
</script>
@endsection