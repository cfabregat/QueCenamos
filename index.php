<html>
<body>
<h1>Que Cenamos</h1>

<h2>Busque y elija el plato que desea y al menor precio</h2>

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
            <p align="center" style="border: red 5px solid;">Foto</p>
            <button onclick="">Cambiar</button><br / >
            Haga click sobre la foto cuando quiera ese plato
        </td>
    </tr>

</table>

<h3><p align="center">Listado de Platos</p></h3>
<table border="1" align="center">
    <tr>
    <th>Plato</th>
    <th>Descripci&oacute;n</th>
    <th>Foto</th>
    <th>Precio</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>

<hr>

<p>Usuario: <input type="text" name="usuario"></p>
<p>Clave: <input type="text" name="clave"></p>
<p><input type="submit" name="Ingresar" onClick="window.location='/usuario.php'"><input type="reset"></p>

En caso de perdida de contraseña enviar e-mail a: admin@quecenamos.com.ar
</body>
</html>