<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>
<?php   include 'navbar.php' ?>
contenido html

<?php include 'complemento.php';