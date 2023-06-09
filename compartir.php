<?php
    session_start() ;
?>
<html>
<body>
<?php
    require( 'encabezado.php' ) ;
?>

<h2>Publicar plato</h2>

<h2><p align="center">Ubicación del lugar</p></h2>
<form> 
    <input type="text" value="Nombre">
    <input type="text" value="Direccion">
    <input type="text" value="Telefono">
    <input type="text" value="Red Social">
<hr>
<h2><p align="center">Datos del Plato</p></h2>

   Nombre: <input type="text">
   Descripcion: <input type="text">
   Precio: <input type="text">
   Foto: <input type="file">

    <br />


   <hr>

    <p align='center'><input type="submit" value="Cargar"></p>

</form>
</body>    
</html>