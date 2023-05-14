<?php
    session_start() ;
?>
<html>
<body>
<h1>Que Cenamos</h1>

<hr> 

<p>Usuario: <input type="text" name="usuario">Clave: <input type="text" name="clave"><input type="submit" name="Ingresar" value="Ingresar" onClick="window.location='/usuario.php'"><br /><button onclick="window.location='/clave.php'"">Olvide la contrase&ntilde;a</button></p>

<hr> 

<h2 align='center'>Busque el plato por nombre o ti&eacute;ntese con una foto</h2>

<table border="1" align="center">
    <tr>
        <td>
            <p align="center">Plato a buscar</p>
        </td>
        <td>
            Buscar por foto
        </td>
    </tr>
    <tr>
        <td>
            <form> 
                <input type="text"><br /><input type="submit" value="Buscar">
            </form>
        </td>
        <td>
            <p align="center" style="border: red 5px solid">Foto</p>
            <p align='center'><button onclick="">Cambiar</button><br / >
            Haga click sobre la foto cuando quiera ese plato</p>
        </td>
    </tr>

</table>

<br />
<hr> 

<h3><p align="center">Listado de Platos</p></h3>
<p align='center'>Para ver la ubicación debe estar registrado</p>
<table border="1" align="center">
    <tr>
    <th>Plato</th>
    <th>Descripci&oacute;n</th>
    <th>Foto</th>
    <th>Precio</th>
    <th>Calificacion</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>