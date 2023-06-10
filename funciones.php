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

function usuario_registrar($email,$clave){
    global $con ;
    $idusuario = "NULL" ;
    $rol = "usuario" ;

    mysql_conectar() ;
    $email = mysqli_escape_string($con, $email);
    $clave = mysqli_escape_string($con, $clave);
    $sql = "INSERT INTO usuarios (idusuario, email, clave, rol) VALUES ($idusuario, '$email', '$clave', '$rol');" ;
    mysqli_query( $con, $sql );
    mysql_desconectar() ;
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


?>