<?php
    session_start() ;

    unset( $_SESSION['email'] ) ;
    unset( $_SESSION ) ;

    header( "Location: index.php" ) ;
?>
