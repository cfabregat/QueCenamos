<?php
    session_start() ;

    require( 'funciones.php' ) ;

    if( isset($_POST['accion']) && $_POST['accion']="registro" )
        {
            $email = $_POST['email'] ;
            $clave = $_POST['clave'] ;
            //$_POST['clave2'] ;
            usuario_registrar( $email, $clave ) ;
        }
?>
<html>
<body>
<h1>Que Cenamos</h1>

<hr /> 

Email <form action="index.php" method="post"><input type="hidden" name="accion" value="registro"><input type="text" name="email">Clave: <input type="text" name="clave">Repetir Clave<input type="text" name="clave2"><input type="submit" value="Registrar Usuario"></form>
<br />

<hr /> 

<p>Email: <input type="text" name="usuario">Clave: <input type="text" name="clave"><input type="submit" name="Ingresar" value="Ingresar" onClick="window.location='/usuario.php'"><button onclick="window.location='/clave.php'"">Olvide la contrase&ntilde;a</button></p>

<hr> 

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
    <form> 
    Fecha<input type="text" value="">
    Ubicación del lugar
    <input type="text" value="Nombre">
    <input type="text" value="Direccion">
    <input type="text" value="Telefono">
    <input type="text" value="Red Social">
    <br />
    Nombre del Plato: <input type="text">
    Descripci&oacute;nn: <input type="text">
    Precio: <input type="text">
    Foto: <input type="file">
    <br />
    <button>Calificar</button>
    <p align='center'><input type="submit" value="Publicar"></p>
    </form>
</body>
</html>