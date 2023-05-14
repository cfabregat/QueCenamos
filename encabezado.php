<table width='90%'>
    <tr>
    <td>
        <h1>Que Cenamos</h1>

        <h2>Busque y elija el plato que desea y al menor precio</h2>
    </td>
    <td align='right'>
        <button onclick="window.location='/logout.php'"">Cerrar Session</button>
        <br />
        <button onclick="window.location='/cambiar_clave.html'"">Cambiar clave</button>
        <br />
        <?php
            if( $_SESSION['rol'] == 'gestion' ){
        ?>

        <?php
            if( $_SERVER['REQUEST_URI'] == '/usuario.php' ){
        ?>
        <button onclick="window.location='/gestion.php'"">Vista de Gestion</button>        
        <?php
            }       
        ?>

        <?php
            if( $_SERVER['REQUEST_URI'] == '/gestion.php' ){
        ?>
        <button onclick="window.location='/usuario.php'"">Vista de Usuario</button>
        <?php
            }
        ?>

        <?php
            }       
        ?>

    </td>
    <tr>
</table>