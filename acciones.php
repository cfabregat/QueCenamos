<?php

if( isset($_POST['accion']) && $_POST['accion']=="login" )
        {
            $email = $_POST['email'] ;
            $clave = $_POST['clave'] ;

            validar_usuario( $email, $clave ) ;
        }

    if( isset($_POST['accion']) && $_POST['accion']=="registro" )
        {
            $email = $_POST['email'] ;
            $clave = $_POST['clave'] ;
            $clave2 = $_POST['clave2'] ;

            if( $clave != $clave2 )
                echo "Las claves ingresadas no corresponden" ;
            else
                usuario_registrar( $email, $clave ) ;
        }

    if( isset($_POST['accion']) && $_POST['accion']=="publicar" )
        {
            $fecha = $_POST['fecha'] ;
            $ubicacion_nombre = $_POST['ubicacion_nombre'] ;
            $ubicacion_direccion = $_POST['ubicacion_direccion'] ;
            $ubicacion_telefono = $_POST['ubicacion_telefono'] ;
            $ubicacion_redsocial = $_POST['ubicacion_redsocial'] ;
            $nombre = $_POST['nombre'] ;
            $descripcion = $_POST['descripcion'] ;
            $precio = $_POST['precio'] ;
            $foto = $_FILES['foto']['tmp_name'] ;
            $calificacion = $_POST['calificacion'] ;

            publicar_plato( $fecha, $ubicacion_nombre, $ubicacion_direccion, $ubicacion_telefono, $ubicacion_redsocial, $nombre, $descripcion, $precio, $foto, $calificacion ) ;
        }

        if( isset($_POST['accion']) && $_POST['accion']=="eliminar_publicacion" )
        {
            $idplato = $_POST['idplato'] ;

            eliminar_publicacion( $idplato ) ;
        }


?>