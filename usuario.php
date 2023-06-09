<?php
    session_start() ;
?>
<html>
<body>
<?php
    require( 'encabezado.php' ) ;
?>

<hr>

<p align='center'><button onclick="window.location='/usuario.php'"">Buscar Plato</button><button onclick="window.location='/compartir.php'"">Compartir Plato</button></p>

<hr>

Plato a buscar:
<form> 
    <input type="text"> <input type="submit" value="Buscar"> <input type="reset">
</form>

<table border="1">
    <tr>
        <th>Favorito</th>
        <th>Plato</th>
        <th>Foto</th>
        <th>Precio</th>
        <th>Calificaciones</th>
        <th>Recomendar</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="text" value="Email a quien recomendar"><button>Enviar recomendacion</button>
    </tr>
</table>


<hr> 

Platos favoritos

<br><br>
<table border="1">
    <tr>
        <th>Favorito</th>
        <th>Plato</th>
        <th>Foto</th>
        <th>Precio</th>
        <th>Calificacion</th>
        <th>Ubicaci&oacute;n</th>
        <th>Recomendar</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="text" value="Email a quien recomendar"><button>Enviar recomendacion</button>
    </tr>
</table>

<hr>
<h3>Recomendaciones de otros usuarios</h3>
<table border="1">
    <tr>
    <th>Usuario</th>
    <th>Plato</th>
    <th>Foto</th>
    <th>Precio</th>
    <th>Calificaciones</th>
    <th>Ubicación</th>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>
</body>    
</html>