<table width='90%'>
    <tr>
    <td>
        <h1>Que Cenamos <h4>(<?php echo isset($_SESSION['email'])?$_SESSION['email']:''; ?>)</h4></h1>
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
        <button onclick="window.location='/usuario.php'"">Vista de Usuario</button>

    </td>
    <tr>
</table>