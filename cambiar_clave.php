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
    <link rel="stylesheet" href="css/estilosForm.css">
    


<!-- 
<div class="modal fade " id="cambiarClave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Iniciar sesion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Clave actual</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <label for="inputPassword5" class="form-label">Nueva clave</label>
                    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">

                    <label for="inputPassword5" class="form-label">Repetir nueva clave</label>
                    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                    <br>
                    <button type="submit" class="btn btn-primary">Cambiar clave</button>    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Iniciar sesion</button>
            </div>
        </div>
    </div>
</div> -->


<form action="index.php">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Clave actual</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>

    <div class="mb-3">
        <label for="inputPassword5" class="form-label">Nueva clave</label>
        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
    </div>

    <div class="mb-3">
        <label for="inputPassword5" class="form-label">Repetir nueva clave</label>
        <div>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <button type="button"><i class="fa-solid fa-eye-slash"></i></button>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Cambiar clave</button>    
</form>


<!-- JAVASCRIPT DE BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- JAVASCRIPT DE FONTAWESOME -->
<script src="https://kit.fontawesome.com/4a51d70254.js" crossorigin="anonymous"></script>

</body>
</html>