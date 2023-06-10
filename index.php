<?php
    session_start() ;

    $_SESSION['rol'] = 'usuario' ;

    require( 'funciones.php' ) ;

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
            $foto = $_POST['foto'] ;

            publicar_plato( $fecha, $ubicacion_nombre, $ubicacion_direccion, $ubicacion_telefono, $ubicacion_redsocial, $nombre, $descripcion, $precio, $foto ) ;
        }
?>
<html>
<body>
<table align='center' width='90%'>
    <tr>
    <td align='center'>
        <h1>¿Que Cenamos?<h4><?php echo isset($_SESSION['email'])? $_SESSION['email'] . '<br />('. $_SESSION['idusuario'] . ')' :''; ?></h4></h1>
    </td>
    <td>
        <?php  
            //  Si no esta logeado muestro la parte de registrar
            if( !isset($_SESSION['email']) ){
        ?>
            <form action="index.php" method="post">
            <input type="hidden" name="accion" value="registro">
            Email<input type="text" name="email"><br />
            Clave: <input type="text" name="clave"><br />
            Repetir Clave: <input type="text" name="clave2"><br />
            <input type="submit" value="Registrar Usuario">
            </form>
        <?php
            }
        ?>
    </td>

    <td>
        <?php  
            //  Si no esta logeado muestro la parte de registrar
            if( !isset($_SESSION['email']) ){
        ?>
            <form action="index.php" method="post">
            <input type="hidden" name="accion" value="login">
            Email:<input type="text" name="email"><br />
            Clave:<input type="text" name="clave"><br />
            <input type="submit" value="Ingresar">
            <button onclick="window.location='/clave.php'"">Olvide la contrase&ntilde;a</button>
            </form>
        <?php
            }
        ?>
    </td>        

    <td>
        <?php  
            //  Si esta logeado muestro la parte de registrar
            if( isset($_SESSION['email']) ){
        ?>
        <button onclick="window.location='/logout.php'"">Cerrar Session</button>
        <br />
        <button onclick="window.location='/cambiar_clave.html'"">Cambiar clave</button>
        <br />
        <?php
            if( $_SESSION['rol'] == 'gestion' ){
        ?>
            <button onclick="window.location='/gestion.php'"">Vista de Gestion</button>        
        <?php
            }       
        ?>

        <?php
            }       
        ?>

    </td>
    <tr>
</table>

<hr /> 

<h2>Busque el plato por nombre o ti&eacute;ntese con una foto</h2>

<table border="1" align="center">
    <tr>
        <td><p align="center">Plato a buscar</p></td>
        <td><p align="center">Buscar por foto</p></td>
    </tr>
    <tr>
        <td>
            <form> 
                <input type="text"><br /><input type="submit" value="Buscar">
            </form>
        </td>
        <td>
            <p align="center" style="border: red 5px solid">Foto</p>
            <p align='center'><button onclick="">Voy a tener suerte</button><br / >
            Haga click sobre la foto cuando quiera ese plato</p>
        </td>
    </tr>

</table>

<h4><p align="center">Resultado de Busqueda</p></h4>
<table border="1" align="center">
    <tr>
    <th>Plato</th>
    <th>Descripci&oacute;n</th>
    <th>Foto</th>
    <th>Precio</th>
    <th>Fecha</th>
    <th>Ubicaci&oacute;n<br />(solo usuario registrado)</th>
    <th>Calificaci&oacute;n</th>
    <th>Mi Calificaci&oacute;n<br />(solo usuario registrado)</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>        
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Promedio</td>
        <td>MiCalificaci&oacute;n <button>ReCalificar</button><button>Eliminar Calificacion</button></td>
    </tr>
</table>

<br /><hr />

<h2>Mis Publicaciones</h2>
<br>
<table align="center" border="1">
    <tr>
        <th>Plato</th>
        <th>Descripci&oacute;n</th>
        <th>Foto</th>
        <th>Precio</th>
        <th>Fecha</th>
        <th>Ubicaci&oacute;n</th>
        <th>Calificaci&oacute;n</th>
        <th>Publicaci&oacute;n</th>
        <th>Recomendar</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Promedio MiCalificaci&oacute;n <button>ReCalificar</button></td>
        <td><button>Eliminar Publicaci&oacute;n</button></td>
        <td><input type="text" value="Email a quien recomendar"><button>Enviar recomendaci&oacute;n</button>
    </tr>
</table>

<br /><hr />

<h2>Recomendaciones de otros usuarios</h2>
<table align="center" border="1">
    <tr>
    <th>Usuario</th>
    <th>Descripci&oacute;n</th>
    <th>Plato</th>
    <th>Foto</th>
    <th>Precio</th>
    <th>Fecha</th>
    <th>Ubicaci&oacute;n</th>
    <th>Calificaci&oacute;n</th>
    <th>Mi Calificaci&oacute;n</th>
    <th>Recomendar</th>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Promedio</td>
    <td>MiCalificacion <button>ReCalificar</button><button>Eliminar Calificacion</button></td>
    <td><button>Eliminar Recomendaci&oacute;nn</button></td>
</tr>
</table>

<br /><hr />

<h2>Publicar plato</h2>
    <table align='center' border='1'>
        <tr>
            <td>
                <form action="index.php" method="post">
                <input type="hidden" name="accion" value="publicar">
                Fecha<input type="text" name="fecha" value="<?php echo date('Y-m-d H:i:s'); ?>"><br />
                Ubicación: 
                    <input type="text" name="ubicacion_nombre" value="Nombre">
                    <input type="text" name="ubicacion_direccion" value="Direccion">
                    <input type="text" name="ubicacion_telefono" value="Telefono">
                    <input type="text" name="ubicacion_redsocial" value="Red Social"><br />
                Plato: 
                    <input type="text" name="nombre" value="Nombre">
                    <input type="text" name="descripcion" value="Descripcion">
                    <input type="text" name="precio" value="Precio"><br />
                Foto: <input type="file" name="foto" value="foto"><br />
                <button>Calificar</button><br   />
                <p align='center'><input type="submit" value="Publicar"></p>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>