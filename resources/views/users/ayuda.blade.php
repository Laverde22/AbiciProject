@extends('layouts.main', ['activePage' => 'ayuda', 'titlePage' => __('TUSPEDIDOS')])

@section('content')
    <section class="content" >
        <div class="content">
            <div class="container-fluid">
                <section id="faq">
                    <h2>Preguntas frecuentes</h2>
                    <!-- Agrega aquí preguntas y respuestas ficticias usando listas o tarjetas -->
                    <div class="accordion" id="faqAccordion">
                        <!-- Ejemplo de pregunta y respuesta -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        ¿Cuál es el área de entrega?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Nuestra área de entrega se limita exclusivamente a la ciudad de Tunja. Nuestro servicio se factura en función del número de cuadras recorridas para llevar a cabo la entrega.
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        ¿Qué tipo de artículos pueden ser entregados en bicicleta?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Ofrecemos el servicio de bicicarga, el cual nos capacita para transportar artículos pesados e incluso de gran tamaño, superiores a 50 kg o que midan más de un metro. Sin embargo, para estos casos especiales, se aplicará un costo adicional de 3000 pesos colombianos.
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        ¿Cuáles son los métodos de pago aceptados?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Nuestra variedad de métodos de pago se adapta a tu conveniencia. Aceptamos transacciones a través de Nequi y Daviplata, transferencias desde cuentas de ahorros Bancolombia, pagos con tarjeta, así como la opción tradicional de efectivo.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Agrega más preguntas y respuestas similares -->
                    </div>
                </section>
                

                <section id="contact">
                    <h2>Contáctanos</h2>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu número de teléfono">
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje:</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="reloadPage()">Enviar <i class="material-icons">send</i></button>                    </form>
                </section>
                

        <!-- Actualizaciones y noticias -->
        <section id="updates">
            <h2>Actualizaciones y noticias</h2>
        
            <!-- Sección: Trabaja con nosotros/Afília tu tienda -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Trabaja con nosotros / Afilia tu tienda</h5>
                    <p class="card-text">¡Estamos en busca de tiendas interesadas en formar parte de nuestra red de domicilios! Únete a nosotros y expande tu alcance.</p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        
            <!-- Sección: Buscamos domiciliarios -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Buscamos domiciliarios</h5>
                    <p class="card-text">¿Eres un conductor responsable y buscas oportunidades laborales? ¡Te estamos buscando para unirte a nuestro equipo de domiciliarios!</p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        </section>
        
            </div>  
        </div> 
        
        <script>
            function reloadPage() {
                // Recargar la página
                location.reload();
        
                // Mostrar un mensaje de alerta
                alert('Gracias por compartir tu opinión con nosotros!! \nEstamos trabajando en darte una pronta respuesta. \uD83D\uDE00');
            }
        </script><!-- Agrega más iconos según sea necesario -->
@endsection

