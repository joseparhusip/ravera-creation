<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ravera Creation</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding-top: 80px; /* Jarak untuk navbar yang fixed */
            background-color: #f8f8f8;
            color: #333;
        }

        /* --- STYLING UMUM --- */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        /* --- SKELETON LOADING STYLES - FIXED TO LIGHT COLORS --- */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
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
            margin-bottom: 8px;
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite linear;
            border-radius: 4px;
        }

        .skeleton-text-short {
            width: 60%;
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite linear;
        }

        .skeleton-circle {
            border-radius: 50%;
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite linear;
        }
    </style>
</head>
<body>

    {{-- Panggil navbar --}}
    @include('layouts.partials.navbar')

    {{-- Konten halaman akan disuntikkan di sini --}}
    @yield('content')

    {{-- Panggil footer --}}
    @include('layouts.partials.footer')

    {{-- Tombol WhatsApp --}}
    <a href="https://wa.me/+6281292690095" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    
</body>
</html>