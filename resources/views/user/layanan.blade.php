@extends('layouts.app')

@section('content')
<style>
    /* --- LAYANAN SECTION --- */
    .services-section {
        padding: 120px 50px 80px 50px;
        text-align: center;
        background-color: #f9f9f9;
    }
    .services-section .label {
        background-color: #E0E0E0;
        color: #5D724F;
        padding: 8px 20px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 14px;
    }
    .services-section h2 {
        font-size: 36px;
        margin-bottom: 50px;
        color: #333;
        font-family: 'Times New Roman', Times, serif;
    }
    .service-cards {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }
    .service-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        padding: 40px 30px;
        width: 320px;
        text-align: left;
        transition: all 0.4s ease;
        border: 1px solid rgba(197, 179, 88, 0.1);
        position: relative;
        overflow: hidden;
    }
    .service-card:hover {
        background: linear-gradient(135deg, #C5B358, #8B751D);
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(197, 179, 88, 0.25);
        border-color: transparent;
    }
    .service-card .icon {
        font-size: 48px;
        margin-bottom: 25px;
        color: #C5B358;
        transition: all 0.4s ease;
    }
    .service-card:hover .icon {
        color: white;
    }
    .service-card h3 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
        font-family: 'Times New Roman', Times, serif;
        transition: all 0.4s ease;
    }
    .service-card:hover h3 {
        color: white;
    }
    .service-card p {
        font-size: 16px;
        line-height: 1.7;
        color: #666;
        transition: all 0.4s ease;
    }
    .service-card:hover p {
        color: white;
    }

    /* --- CTA SECTION --- */
    .cta-section {
        background: url('{{ asset("assets/img/bunga-peony.jpg") }}') no-repeat center center;
        background-size: cover;
        color: white;
        text-align: center;
        padding: 120px 20px;
        position: relative;
        margin-top: 100px;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
        z-index: 1;
    }
    .cta-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }
    .cta-content h2 {
        font-size: 42px;
        margin-bottom: 25px;
        font-family: 'Times New Roman', Times, serif;
    }
    .cta-content p {
        font-size: 18px;
        line-height: 1.8;
        margin-bottom: 40px;
        color: #e0e0e0;
    }
    .cta-content .btn {
        background-color: #C5B358;
        color: white;
        padding: 16px 45px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 18px;
        transition: all 0.3s ease;
        border: 2px solid #C5B358;
        display: inline-block;
    }
    .cta-content .btn:hover {
        background-color: transparent;
        color: #C5B358;
        border-color: #C5B358;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(197, 179, 88, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .services-section {
            padding: 100px 20px 60px 20px;
        }
        .services-section h2 {
            font-size: 28px;
        }
        .service-card {
            width: 100%;
            max-width: 350px;
        }
        .cta-content h2 {
            font-size: 32px;
        }
        .cta-content p {
            font-size: 16px;
        }
    }
</style>

<section class="services-section">
    <div class="label">Layanan</div>
    <h2>Cek Layanan Kami</h2>
    <div class="service-cards">
        <div class="service-card">
            <div class="icon"><i class="fas fa-handshake"></i></div>
            <h3>Wedding Organizer</h3>
            <p>Ravera Creation menyediakan layanan Wedding Organizer profesional yang mencakup perencanaan dan koordinasi acara pernikahan secara menyeluruh.</p>
        </div>
        <div class="service-card">
            <div class="icon"><i class="fas fa-brush"></i></div>
            <h3>MakeUp Artist</h3>
            <p>Ravera Creation menghadirkan layanan Make Up Artist profesional untuk menciptakan tampilan memukau di hari pernikahan. Dengan teknik rias yang disesuaikan agar tetap bersinar sepanjang hari.</p>
        </div>
        <div class="service-card">
            <div class="icon"><i class="fas fa-volume-up"></i></div>
            <h3>Sound System</h3>
            <p>Ravera Creation menyediakan layanan sound system berkualitas tinggi untuk memastikan seluruh rangkaian acara pernikahan berjalan lancar dan berkesan.</p>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-content">
        <h2>Tertarik dengan layanan kami?</h2>
        <p>Kami hadir untuk mewujudkan pernikahan impianmu dengan layanan yang profesional, detail, dan penuh kehangatan. Mulai dari perencanaan hingga hari H, kami siap mendampingi setiap langkahmu agar berjalan sempurna dan tak terlupakan.</p>
        <a href="#" class="btn">Hubungi Kami</a>
    </div>
</section>
@endsection