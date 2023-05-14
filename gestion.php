<?php
    session_start() ;
?>
<html>
<body>
<?php
    require( 'encabezado.php' ) ;
?>

<hr>

Alta de Usuarios:
<form> 
   Usuario: <input type="text">
   Clave: <input type="text">
   Rol:
    <select name="rol">
        <option value="volvo">Admin</option>
        <option value="volvo">Retaurante</option>
        <option value="volvo">Usuario</option>
  </select>
  Restaurant: 
    <select name="restaurantes">
        <option value="volvo">Restaurant1</option>
        <option value="volvo">Restaurant2</option>
        <option value="volvo">Restaurant3</option>
    </select>
    <input type="submit" value="Cargar"> <input type="reset">
</form>


<h3><p align="center">Listado de Usuarios</p></h3>
<table border="1" align="center">
    <tr>
    <th>Usuario</th>
    <th>Clave</th>
    <th>Rol</th>
    <th>Modificar</th>
    <th>Eliminar</th>
    </tr>
    <tr>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="submit" value="Modificar"></td>
        <td><input type="submit" value="Eliminar"></td>
    </tr>
</table>

<hr>


</body>
</html>