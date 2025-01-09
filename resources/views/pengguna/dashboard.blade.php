@extends('layouts.app') <!-- Use a different layout if needed -->  
  
@section('content')  
<section id="hero" class="text-center">  
    <div class="container">  
        <h1>Selamat Datang di Web Moms Laundry</h1>  
        <p class="slogan">Temukan layanan laundry terbaik untuk kebutuhan Anda.</p>  
    </div>  
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">  
        <div class="carousel-inner">  
            <div class="carousel-item active">  
                <img src="{{ asset('img/Laundry.jpeg') }}" class="d-block w-100" alt="Laundry Service 1">  
            </div>  
            <div class="carousel-item">  
                <img src="{{ asset('img/Laundry2.jpeg') }}" class="d-block w-100" alt="Laundry Service 2">  
            </div>  
            <div class="carousel-item">  
                <img src="{{ asset('img/Laundry3.jpeg') }}" class="d-block w-100" alt="Laundry Service 3">  
            </div>  
        </div>  
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">  
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>  
            <span class="visually-hidden">Previous</span>  
        </button>  
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">  
            <span class="carousel-control-next-icon" aria-hidden="true"></span>  
            <span class="visually-hidden">Next</span>  
        </button>  
    </div>  
</section>  
  
<section id="services" class="py-5" style="background-color: #f7f9fc;">  
    <div class="container">  
        <h2 class="section-title text-center mb-5">Layanan Kami</h2>  
        <div class="row">  
            @foreach ([  
                ['image' => 'CuciGosok.PNG', 'title' => 'Cuci Gosok', 'price' => '2 hari: Rp 6.000/kg'],  
                ['image' => 'CGExpress.PNG', 'title' => 'Cuci Gosok Express', 'price' => '6 Jam: Rp 10.000/kg'],  
                ['image' => 'CG24JAM.PNG', 'title' => 'Cuci Gosok Express < 24 Jam', 'price' => 'Rp 8.000/kg'],  
                ['image' => 'BedCover.jpeg', 'title' => 'Bed Cover/Selimut', 'price' => 'Rp 10.000/kg'],  
                ['image' => 'CuciAtauGosok.jpeg', 'title' => 'Cuci atau Gosok Saja', 'price' => 'Rp 4.500/kg'],  
                ['image' => 'JasAtauCelana.jpeg', 'title' => 'Jas + Celana Set', 'price' => 'Rp 35.000'],  
                ['image' => 'Helm.jpeg', 'title' => 'Helm Biasa', 'price' => 'Rp 20.000 - 35.000'],  
                ['image' => 'CuciSepatu.jpeg', 'title' => 'Sepatu', 'price' => 'Rp 20.000 - 35.000']  
            ] as $service)  
                <div class="col-md-4 mb-4">  
                    <div class="card h-100 shadow-lg">  
                        <img src="{{ asset('img/' . $service['image']) }}" class="card-img-top service-image" alt="{{ $service['title'] }}">  
                        <div class="card-body">  
                            <h5 class="card-title text-primary"><i class="fas fa-tshirt"></i> {{ $service['title'] }}</h5>  
                            <p class="card-text">{{ $service['price'] }}</p>  
                        </div>  
                    </div>  
                </div>  
            @endforeach  
        </div>  
    </div>  
</section>  
  
<style>  
    /* Hero Section */  
    #hero {  
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/path/to/your/image.jpg') no-repeat center center/cover;  
        color: #fff;  
        padding: 80px 0;  
        text-align: center;  
    }  
  
    #hero h1 {  
        font-size: 3rem;  
        font-weight: 700;  
    }  
  
    .slogan {  
        font-size: 1.5rem;  
        color: #fff;  
        font-weight: bold;  
        margin-top: 20px;  
        transition: opacity 1s ease-in-out;  
    }  
  
    .carousel-item img {  
        height: 400px;  
        object-fit: cover;  
    }  
  
    /* Section Services */  
    .service-image {  
        height: 200px;  
        object-fit: cover;  
        border-radius: 8px;  
    }  
  
    .section-title {  
        font-size: 2.5rem;  
        color: #333;  
        text-transform: uppercase;  
        position: relative;  
        font-weight: 600;  
    }  
  
    .section-title::after {  
        content: "";  
        position: absolute;  
        left: 50%;  
        bottom: -10px;  
        width: 80px;  
        height: 4px;  
        background-color: #007bff;  
        transform: translateX(-50%);  
    }  
  
    .card {  
        border: none;  
        border-radius: 8px;  
        transition: transform 0.3s ease, box-shadow 0.3s ease;  
    }  
  
    .card:hover {  
        transform: translateY(-10px);  
        box-shadow: 0px 4px 20px rgba(0, 123, 255, 0.2);  
    }  
  
    .card-title {  
        color: #007bff;  
        font-weight: 600;  
    }  
  
    .card-text {  
        color: #555;  
        font-size: 1.1rem;  
    }  
  
    .text-primary {  
        color: #007bff;  
    }  
  
    /* Responsive Adjustments */  
    @media (max-width: 768px) {  
        #hero h1 {  
            font-size: 2rem;  
        }  
    }  
</style>  
  
<script>  
    document.addEventListener("DOMContentLoaded", function() {  
        const slogan = document.querySelector('.slogan');  
        slogan.style.opacity = 0;  
        slogan.style.transition = 'opacity 1s ease-in-out';  
        setTimeout(() => {  
            slogan.style.opacity = 1;  
        }, 500);  
    });  
</script>  
@endsection 