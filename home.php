<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>
<?php include 'navbar.php' ?>

                <div class="container-fluid p-3">Contenido de bienvenida</div>
<?php
include 'complemento.php';
