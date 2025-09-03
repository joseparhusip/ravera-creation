@extends('layouts.app')

@section('content')
<style>
    .bg-image {
        background-image: url("{{ asset('assets/img/bg-home.jpg') }}");
        height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        filter: brightness(60%);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: -1;
    }
    
    .content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
        position: relative;
        z-index: 1;
        color: white;
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
        text-shadow: none;
        text-decoration: none;
        display: inline-block;
    }

    .btn-start:hover {
        background-color: white;
        color: black;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }
    
    @media (max-width: 768px) {
        h1 { 
            font-size: 2.5rem; 
        }
        p { 
            font-size: 1.2rem; 
            padding: 0 20px; 
        }
        .btn-start { 
            padding: 12px 30px; 
            font-size: 0.9rem; 
        }
    }
</style>

<div class="bg-image"></div>

<div class="content">
    <div>
        <h1>Welcome to Ravera Creation</h1>
        <p>Solution Wedding Organizer and Make Up Artist</p>
        <a href="{{ route('tentang') }}" class="btn-start">MULAI</a>
    </div>
</div>
@endsection