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
<!-- LINK CSS -->
    <link rel="stylesheet" href="css/estilos.css">

<div class="seccionPrincipal">
    <div class="h1Yh4">
        <h1 id="h1QueCenamos">¿Que Cenamos?</h1>
        <h4 id="h4Usuario"><?php echo isset($_SESSION['email'])? $_SESSION['email'] . ' ('. $_SESSION['idusuario'] . ')' :''; ?></h4>
    </div>
    
    <div class="ingresoDeUsuario">
    <!-- INICIO DEL LOGIN -->
        <!-- INICIAR SESION -->
        <!-- Button trigger modal -->
        <?php  
            //  Si no esta logeado muestro la parte de registrar
            if( !isset($_SESSION['email']) ){
        ?>
        <button type="button" class="btn btn-primary btnIngresoDeUsuario" data-bs-toggle="modal" data-bs-target="#iniciarSesion">
          Iniciar sesión
        </button>

        <!-- Modal -->
        <div class="modal fade " id="iniciarSesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Iniciar sesion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                            <form action="index.php" method="post">
                            <input type="hidden" name="accion" value="login">
                            Email:<input type="text" name="email"><br />
                            Clave:<input type="text" name="clave"><br />
                            <input type="submit" value="Ingresar">
                            <button onclick="window.location='/olvide_clave.php'">Olvide la contrase&ntilde;a</button>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Iniciar sesion</button>
                    </div>
                </div>
            </div>
        </div>
        |
        <?php
            }
        ?>

        <!-- FIN INICIAR SESION -->

        <!-- INICIO DEL BOTON DE REGISTRO DE USUARIO -->
        <!-- Button trigger modal -->
        <?php  
            //  Si no esta logeado muestro la parte de registrar
            if( !isset($_SESSION['email']) ){
        ?>
        <button type="button" class="btn btn-primary btnIngresoDeUsuario" data-bs-toggle="modal" data-bs-target="#registrarUsuario">
          Registrarse
        </button>

        <!-- Modal -->
        <div class="modal fade" id="registrarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                            <form action="index.php" method="post">
                            <input type="hidden" name="accion" value="registro">
                            Email<input type="text" name="email"><br />
                            Clave: <input type="text" name="clave"><br />
                            Repetir Clave: <input type="text" name="clave2"><br />
                            <input type="submit" value="Registrar Usuario">
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Registrar usuario</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DEL BOTON DE REGISTRO DE USUARIO -->
        <?php
            }
        ?>

        <!-- INICIO BOTON CERRAR SESION Y CAMBIAR CLAVE -->
            <?php  
                //  Si esta logeado muestro la parte de registrar
                if( isset($_SESSION['email']) ){
            ?>
            <button onclick="window.location='/logout.php'" class="btn btn-primary btnIngresoDeUsuario" data-bs-toggle="modal" data-bs-target="#cerrarSesion">Cerrar Sesion</button>
            |
            <button onclick="window.location='/cambiar_clave.php'" class="btn btn-primary btnIngresoDeUsuario" data-bs-toggle="modal" data-bs-target="#cambiarClave">Cambiar clave</button>
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
        <!-- FIN BOTON CERRAR SESION -->

    <!-- FIN DEL LOGIN -->
    </div>
</div>



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

                <br>
                
            <!-- TABLA -->
                <table border="1" align="center" class="table align-middle table-bordered border-secondary">
                    <thead class="align-middle text-center">
                        <tr>
                            <th>Plato</th>
                            <th>Descripci&oacute;n</th>
                            <th>Foto</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                            <th>Ubicaci&oacute;n<br />(solo usuario registrado)</th>
                            <th>Calificaci&oacute;n<br />Promedio <?php if( isset($_SESSION['email']) ) echo "/ MiCalificacion" ; ?></th>
                        </tr>
                    </thead>
                    <?php
                    global $con ;

                    $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : '';

                    mysql_conectar() ;
                    $sql = "SELECT * FROM platos WHERE nombre LIKE '%" . $buscar . "%' OR descripcion LIKE '%" . $buscar . "%';" ;
                    $rec = mysqli_query( $con, $sql );
                    while( $reg = mysqli_fetch_assoc($rec) ){
                        $idplato = $reg['idplato'] ;
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $reg['nombre'] ; ?></td>
                            <td><?php echo $reg['descripcion'] ; ?></td>        
                            <td><img width="175" height="115" src="<?php echo $reg['foto']=="" ? "/imagenes/sin_imagen.jpg" : $reg['foto']; ?>"></td>
                            <td align="right"><?php echo sprintf('%0.2f', $reg['precio']) ; ?></td>
                            <td><?php echo $reg['fecha'] ; ?></td>
                            <td><?php 
                                if( !isset($_SESSION['email']) )
                                    echo "&nbsp;" ;
                                else   
                                    echo $reg['ubicacion'] ;
                                ?>
                            </td>
                            <td align="center"><?php echo calificaciones_promedio($idplato); ?><?php if( isset($_SESSION['email']) ) echo " / " . calificacion($_SESSION['idusuario'],$idplato) ; ?></td>
                        </tr>
                    </tbody>
                    <?php  
                        }
                    ?>
                </table>
            </form>
            <br>
            <hr>
            <br>

        </div>

        <!-- SEGUNDA TAB -->
        <div class="tab-pane fade" id="misPublicaciones" role="tabpanel" aria-labelledby="profile-tab">
            <?php
            if( isset($_SESSION['email']) ){
            ?>
  
            <h2>Mis Publicaciones</h2>
            <br>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <table border="1" align="center" class="table align-middle table-bordered border-secondary">
                    <thead class="align-middle text-center">
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
                    </thead>
                <?php
                    global $con ;
                
                    mysql_conectar() ;
                    $sql = "SELECT * FROM platos WHERE idusuario=" . $_SESSION['idusuario'] . ";" ;
                    $rec = mysqli_query( $con, $sql );
                    while( $reg = mysqli_fetch_assoc($rec) ){
                        $idplato = $reg['idplato'] ;
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $reg['nombre'] ; ?></td>
                            <td><?php echo $reg['descripcion'] ; ?></td>
                            <td><img width="175" height="115" src="<?php echo $reg['foto'] ; ?>"></td>
                            <td align="right"><?php echo sprintf('%0.2f', $reg['precio']) ; ?></td>
                            <td><?php echo $reg['fecha'] ; ?></td>
                            <td><?php echo $reg['ubicacion'] ; ?></td>
                            <td align="center"><?php echo calificaciones_promedio($idplato); ?> / <?php echo calificacion($_SESSION['idusuario'],$idplato) ; ?></td>
                            <td><input type="hidden" name="idplato" value="<?php echo $reg['idplato']; ?>"><input type="submit" name="accion" value="Eliminar Publicacion" ></td>
                            <td>
                                    <select name="email_recomendar">
                                    <?php  
                                        $emails = obtener_emails() ;
                                        foreach( $emails as $v ){
                                    ?>
                                    <option value="<?php echo $v[0] ; ?>"><?php echo $v[1] ; ?></option>
                                    <?php  
                                        }
                                    ?>
                                    </select>
                                    <input type="submit" name="accion" value="Enviar Recomendacion">
                        </tr>
                    </tbody>
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
            <table border="1" align="center" class="table align-middle table-bordered border-secondary">
                <thead class="align-middle text-center">
                    <tr>
                    <th>Usuario</th>
                    <th>Descripci&oacute;n</th>
                    <th>Plato</th>
                    <th>Foto</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>Ubicaci&oacute;n</th>
                    <th>Calificaci&oacute;n</th>
                    <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><button> <i class="fa-solid fa-trash"></i> Eliminar Recomendaci&oacute;nn</button></td>
                    </tr>
                </tbody>
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
                            <input type="text" name="ubicacion_nombre" placeholder="Nombre">
                            <input type="text" name="ubicacion_direccion" placeholder="Direccion">
                            <input type="text" name="ubicacion_telefono" placeholder="Telefono">
                            <input type="text" name="ubicacion_redsocial" placeholder="Red Social"><br />
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
                        <br  />
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
<!-- JAVASCRIPT DE FONTAWESOME -->
<script src="https://kit.fontawesome.com/4a51d70254.js" crossorigin="anonymous"></script>

</body>
</html>