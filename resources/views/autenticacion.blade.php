<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/autenticacion/autebticacion.css">
    <link rel="stylesheet" href="/autenticacion/autenticacion.js">
</head>
<body>
    @yield('popup')
    <button id="btn-abrir-modal">abrir modal</button>
    <dialog id="modal">
        <h2>hola soy un modal</h2>
        <p><=></p>
        <button id="cerrar-modal">cerrar modal</button>
    </dialog>    

</body>
</html>

