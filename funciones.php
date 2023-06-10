<?php

$mysql_usuario = 'root' ;
$mysql_clave = '' ;
$mysql_base = 'quecenamos' ;
$con ;

function mysql_conectar(){
    global $con, $mysql_usuario, $mysql_clave, $mysql_base ;
    $con = mysqli_connect( '127.0.0.1', $mysql_usuario, $mysql_clave, $mysql_base) ;
}
function mysql_desconectar(){
    global $con ;
    mysqli_close( $con ) ;
}

function validar_usuario( $email, $clave ){
    global $con ;
    
    mysql_conectar() ;
    $email = mysqli_escape_string($con, $email);
    $sql = "SELECT idusuario FROM usuarios WHERE email='$email' AND clave='$clave';" ;
    $rec = mysqli_query( $con, $sql );
    if( mysqli_num_rows($rec) > 0 ){
        $reg = mysqli_fetch_assoc($rec) ;
        $_SESSION['idusuario'] = $reg['idusuario'] ;
        $_SESSION['email'] = $email ;
        }
    mysql_desconectar() ;

    return;
}

function usuario_registrar($email,$clave){
    global $con ;
    $rol = "usuario" ;

    if( usuario_existe($email) > 0 ){
        echo "El usuario ya existe" ;
        return ;
    }

    mysql_conectar() ;
    $email = mysqli_escape_string($con, $email);
    $clave = mysqli_escape_string($con, $clave);
    $sql = "INSERT INTO usuarios (idusuario, email, clave, rol) VALUES (NULL, '$email', '$clave', '$rol');" ;
    mysqli_query( $con, $sql );
    mysql_desconectar() ;

    usuario_email_registro( $email, $clave ) ;
}

function usuario_email_registro( $email, $clave ){

    $asunto = 'Registracion en el Sitio QueCenamos?' ;
    $mensaje = 'Bienvenido al Sitio QueCenamos' . 'Sus credenciales son: $email, $clave' ;
    $cabeceras = 'From: webmaster@quecenamos.com.ar' . "\r\n" . 'Reply-To: webmaster@quecenamos.com.ar' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    try {
        //$res = mail( $email, $asunto, $mensaje, $cabeceras ) ;
    } catch (Exception $e) {
        //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function usuario_existe($email){
    global $con ;
    
    mysql_conectar() ;
    $email = mysqli_escape_string($con, $email);
    $sql = "SELECT * FROM usuarios WHERE email='$email';" ;
    $rec = mysqli_query( $con, $sql );
    $res = mysqli_num_rows($rec) ;
    mysql_desconectar() ;

    return( $res ) ;
}

function publicar_plato( $fecha, $ubicacion_nombre, $ubicacion_direccion, $ubicacion_telefono, $ubicacion_redsocial, $nombre, $descripcion, $precio, $foto, $calificacion ){
    global $con ;

    mysql_conectar() ;
    $idusuario = $_SESSION['idusuario'] ;
    $fecha = mysqli_escape_string($con, $fecha);
    $ubicacion = mysqli_escape_string($con, $ubicacion_nombre) . '<br />' . mysqli_escape_string($con, $ubicacion_direccion) . '<br />' . mysqli_escape_string($con, $ubicacion_telefono) . '<br />' . mysqli_escape_string($con, $ubicacion_redsocial);
    $nombre = mysqli_escape_string($con, $nombre);
    $descripcion = mysqli_escape_string($con, $descripcion);
    $precio = mysqli_escape_string($con, $precio);
    $foto = mysqli_escape_string($con, $foto);
    $calificacion = mysqli_escape_string($con, $calificacion);

    $sql = "INSERT INTO platos (idplato, idusuario, nombre, descripcion, foto, precio, fecha, ubicacion) VALUES (NULL, $idusuario, '$nombre', '$descripcion', '$foto', '$precio', '$fecha', '$ubicacion');" ;
    mysqli_query( $con, $sql );
    $idplato = $con->insert_id ;

    $sql = "INSERT INTO calificaciones (idcalificacion, idusuario, idplato, calificacion) VALUES (NULL, $idusuario, $idplato, '$calificacion');" ;
    mysqli_query( $con, $sql );


    mysql_desconectar() ;

}

?>