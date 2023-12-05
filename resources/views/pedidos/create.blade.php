<link rel="stylesheet" href="{{asset('css/crearpedido.css')}}">
<x-app-layout></x-app-layout>
    <section>
        <div class="container-form">
            <h1 class="text-center">Crea Tu Pedido</h1>
            <form action=""method="POST">
                @csrf
                <div class="row">
                    <!-- Primera Columna -->
                        <div class="mb-3">
                            <label for="productos" class="form-label">¿Que necesitas?:</label>
                            <textarea name="productos" id="productos" class="form-control" rows="3" placeholder="Describe lo que podemos hacer por ti"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Puedes Agregar Una Descripción Mas Especifica Si Lo Deseas</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Ejemplo:Preferiblemente que la marca de la crema dental sea Colgate"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" value="{{$direccion}}" name="direccion" id="direccion" class="form-control" placeholder="Ingresa la Direccion En la Que Desees Recibir Tu Pedido">
                        </div> 
                        <div class="mb-3">
                            <input type="hidden" name="fechahora" value="{{ now()->format('Y-m-d H:i:s') }}">
                        </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Solicita Tu Pedido</button>
                </div>
            </form>
        </div>
    </section>
