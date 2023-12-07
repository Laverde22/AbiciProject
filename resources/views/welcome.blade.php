@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => '', 'title' => __('ABICI DOMICILIOS Y MENSAJERIA')])
<link rel="stylesheet" href="{{ asset('css/dashboardadmin.css') }}">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                                 <!-- Sección de Tarjetas de Servicios -->
                        <div class="card-deck mt-4">
                            <!-- Tarjeta 1 - Entrega a Domicilio -->
                            <div class="card">
                                <a href=""><img src="{{ asset('img/welcome/diligencias.png') }}" class="card-img-top border-redon" alt="..."></a>
                                <div class="card-body">
                                    <h5 class="card-title">Entrega a Domicilio</h5>
                                    <p class="card-text">Recibe tus platillos favoritos directamente en la puerta de tu casa.</p>
                                </div>
                            </div>

                            <!-- Tarjeta 2 - Trabajos de Mensajería -->
                            <div class="card">
                                <a href=""><img src="{{ asset('img/welcome/domicilio.png') }}" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h5 class="card-title">Trabajos de Mensajería</h5>
                                    <p class="card-text">Pagamos tus recibos y te ayudamos con el traslado de objetos.</p>
                                </div>
                            </div>

                            <!-- Tarjeta 3 - Otro Servicio -->
                            <div class="card">
                                <a href=""><img src="{{ asset('img/welcome/mensajeria.png') }}" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h5 class="card-title">Otro Servicio</h5>
                                    <p class="card-text">Descripción del servicio adicional que ofreces.</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="" class="btn btn-primary">Pide Tu Primer Servicio!!</a> 
                        </div>
                    </div>
                   

                    <!-- Carrusel de Imágenes -->
                    <section class="mt-4">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <!-- Primer conjunto de imágenes -->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="carusel" src="{{ asset('img/coronaburguer.jpg') }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="col-md-3">
                                            <img class="carusel" src="{{ asset('img/moscovita.jpg') }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="col-md-3">
                                            <img class="carusel" src="{{ asset('img/burguerfries.jpg') }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="col-md-3">
                                            <img class="carusel" src="{{ asset('img/fuego.jpg') }}" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Segundo conjunto de imágenes -->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="carusel" src="{{ asset('img/porsupollo.jpg') }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="col-md-3">
                                            <img class="carusel" src="{{ asset('img/sushimi.jpg') }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="col-md-3">
                                            <img class="carusel" src="{{ asset('img/laarepa.jpg') }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="col-md-3">
                                            <img class="carusel" src="{{ asset('img/santoremedio.jpg') }}" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                </div>                     
                                <!-- Agrega más conjuntos de imágenes aquí -->
                        
                                <div class="controls">
                                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                
                            </div>
                        </div>       
                        
                    </section>
                    <!-- Fin del Carrusel de Imágenes -->
                </div>
            </div>
        </div>
    </div>
@endsection
