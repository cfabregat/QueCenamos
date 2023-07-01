<?php
    session_start() ;

    date_default_timezone_set('America/Argentina/Buenos_Aires') ;

    $_SESSION['rol'] = 'usuario' ;

    require( 'funciones.php' ) ;
    require( 'acciones.php' ) ;

?>
<html>
<body>
<!-- LINK BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- LINK CSS -->
    <link rel="stylesheet" href="css/estilos.css">

--- OLVIDE CLAVE

EMAIL

ENVIAR CLAVE
CAMBIAR CLAVE CANCELAR

<!-- JAVASCRIPT DE BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>