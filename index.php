<?php
    session_start() ;

    date_default_timezone_set('America/Argentina/Buenos_Aires') ;

    $_SESSION['rol'] = 'usuario' ;

    require( 'funciones.php' ) ;
    require( 'acciones.php' ) ;

?>
<html>
<body>
    <!-- LINK BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <button onclick="window.location='/cambiar_clave.php'"">Cambiar clave</button>
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

<!-- INICIO DE LAS TABS -->
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="buscarPlato-tab" data-bs-toggle="tab" data-bs-target="#buscarPlato" type="button" role="tab" aria-controls="buscarPlato" aria-selected="true">Buscar</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="misPublicaciones-tab" data-bs-toggle="tab" data-bs-target="#misPublicaciones" type="button" role="tab" aria-controls="misPublicaciones" aria-selected="false">Mis publicaciones</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="recomendaciones-tab" data-bs-toggle="tab" data-bs-target="#recomendaciones" type="button" role="tab" aria-controls="recomendaciones" aria-selected="false">Recomendaciones</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="publicarPlato-tab" data-bs-toggle="tab" data-bs-target="#publicarPlato" type="button" role="tab" aria-controls="publicarPlato" aria-selected="false">Publicar</button>
      </li>
    </ul>

    <!-- CONTENIDO DE LAS TABS -->
    <div class="tab-content" id="myTabContent">
      
      <!-- PRIMER TAB -->
      <div class="tab-pane fade show active" id="buscarPlato" role="tabpanel" aria-labelledby="home-tab">
        <h2>Busque el plato por nombre o ti&eacute;ntese con una foto</h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
        <?php
            $res = foto_aleatoria() ;
            $idplato = $res[0] ;
            $foto = $res[1] ;
        ?>
        <table border="1" align="center">
            <tr>
                <td><p align="center">Buscar por Nombre o Descripci&oacute;n</p></td>
                <td><p align="center">Buscar por foto<br />(haga click sobre la foto cuando quiera ese plato)</p></td>
            </tr>
            <tr>
                <td>
                    <form> 
                    <br />
                    <p align='center'><input type="text" name="buscar"><br /><input type="submit" value="Buscar"></p>
                    </form>
                </td>
                <td>
                <p align='center'><img width="175" height="115" src="<?php echo $foto ; ?>"></p>
                <p align='center'><input type="submit" value="Voy a tener suerte"></p>
                </td>
            </tr>
        </table>

        <br />
        
        <table border="1" align="center">
            <tr>
            <th>Plato</th>
            <th>Descripci&oacute;n</th>
            <th>Foto</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Ubicaci&oacute;n<br />(solo usuario registrado)</th>
            <th>Calificaci&oacute;n<br />Promedio / MiCalificacion</th>
            </tr>
        <?php
        global $con ;

        $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : '';

        mysql_conectar() ;
        $sql = "SELECT * FROM platos WHERE nombre LIKE '%" . $buscar . "%' OR descripcion LIKE '%" . $buscar . "%';" ;
        $rec = mysqli_query( $con, $sql );
        while( $reg = mysqli_fetch_assoc($rec) ){
            $idplato = $reg['idplato'] ;
        ?>
            <tr>
                <td><?php echo $reg['nombre'] ; ?></td>
                <td><?php echo $reg['descripcion'] ; ?></td>        
                <td><img width="175" height="115" src="<?php echo $reg['foto'] ; ?>"></td>
                <td align="right"><?php echo sprintf('%0.2f', $reg['precio']) ; ?></td>
                <td><?php echo $reg['fecha'] ; ?></td>
                <td><?php echo $reg['ubicacion'] ; ?></td>
                <td align="center"><?php echo calificaciones_promedio($idplato); ?> / <?php echo calificacion($_SESSION['idusuario'],$idplato) ; ?></td>
            </tr>
        <?php  
            }
        ?>
        </table>
        </form>

        <br />
      </div>

      <!-- SEGUNDA TAB -->
      <div class="tab-pane fade" id="misPublicaciones" role="tabpanel" aria-labelledby="profile-tab">
        <?php
        if( isset($_SESSION['email']) ){
        ?>
  
        <h2>Mis Publicaciones</h2>
        <br>
        <form action="index.php" method="post" enctype="multipart/form-data">
        <table align="center" border="1">
            <tr>
                <th>Plato</th>
                <th>Descripci&oacute;n</th>
                <th>Foto</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Ubicaci&oacute;n</th>
                <th>Calificaci&oacute;n<br />Promedio / MiCalificacion</th>
                <th>Publicaci&oacute;n</th>
                <th>Recomendar</th>
            </tr>
        <?php
            global $con ;
            
            mysql_conectar() ;
            $sql = "SELECT * FROM platos WHERE idusuario=" . $_SESSION['idusuario'] . ";" ;
            $rec = mysqli_query( $con, $sql );
            while( $reg = mysqli_fetch_assoc($rec) ){
                $idplato = $reg['idplato'] ;
        ?>
            <tr>
                <td><?php echo $reg['nombre'] ; ?></td>
                <td><?php echo $reg['descripcion'] ; ?></td>
                <td><img width="175" height="115" src="<?php echo $reg['foto'] ; ?>"></td>
                <td align="right"><?php echo sprintf('%0.2f', $reg['precio']) ; ?></td>
                <td><?php echo $reg['fecha'] ; ?></td>
                <td><?php echo $reg['ubicacion'] ; ?></td>
                <td align="center"><?php echo calificaciones_promedio($idplato); ?> / <?php echo calificacion($_SESSION['idusuario'],$idplato) ; ?></td>
                <td><input type="hidden" name="idplato" value="<?php echo $reg['idplato']; ?>"><input type="submit" name="accion" value="Eliminar Publicacion"></td>
                <td><input type="text" name="email_recomendar" value="Email a quien recomendar"><input type="submit" name="accion" value="Enviar Recomendacion">
            </tr>
        <?php
                    }
            mysql_desconectar() ;
        ?>
        </table>
        </form>
  
        <?php
        }
        ?>
  
        <br />
      </div>
      
      <!-- TERCER TAB -->
      <div class="tab-pane fade" id="recomendaciones" role="tabpanel" aria-labelledby="contact-tab">
        <?php
        if( isset($_SESSION['email']) ){
        ?>

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

        <?php
        }
        ?>

        <br />
      </div>

      <!-- CUARTA TAB -->
      <div class="tab-pane fade" id="publicarPlato" role="tabpanel" aria-labelledby="contact-tab">
        <?php
        if( isset($_SESSION['email']) ){
        ?>


        <h2>Publicar plato</h2>
            <table align='center' border='1'>
                <tr>
                    <td>
                        <form action="index.php" method="post" enctype="multipart/form-data">
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
                        Calificaci&oacute;n:
                            <select name="calificacion">
                            <option value='1'>Mala</option>
                            <option value='2'>Regular</option>
                            <option value='3' selected>Buena</option>
                            <option value='4'>Muy buena</option>
                            <option value='5'>Excelente</option>
                            </select>
                        <br   />
                        <p align='center'><input type="submit" value="Publicar"></p>
                        </form>
                    </td>
                </tr>
            </table>

        <?php
        }
        ?>
      </div>
      
    </div>
  </div>
    <!-- FIN CONTENIDO DE LAS TABS -->
  <!-- FIN DE LAS TABS -->

<!-- JAVASCRIPT DE BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>