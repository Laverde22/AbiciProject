<link rel="stylesheet" href="{{asset('css/crearpedido.css')}}">
<x-app-layout></x-app-layout>

<main>
    <div class="content-form">
        <h1> A UN PASO DE PEDIR TU DOMI!</h1>
        <form class="form-crearpedido" action="{{route('domicilio.verificar')}}" method="POST">
            <fieldset>
                <legend>Por favor, ingrese su tipo de documento y su número de identificación:</legend>
                @csrf <!-- Agrega esto si estás utilizando Laravel para proteger contra CSRF -->
                <div>
                    <label for="tipoDocumento">Tipo de Documento:</label>
                    <select id="tipoDocumento" name="tipoDocumento">
                        <option value="CC">Cédula de Ciudadania</option>
                        <option value="TI">Targeta Identidad</option>
                    </select>
                </div>
                <div>
                    <label for="numeroidentificacion">Número de Identificación:</label>
                    <input type="number" id="numeroidentificacion" name="numeroidentificacion" required>
                </div>
                <button  type="submit">Verificar</button>       
            </fieldset>
        </form>
    </div>
</main>