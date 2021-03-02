<?php

session_start();
include 'conexion.php';
$res = array();
$usuario = $_POST['user'];
$contrasena = ($_POST['pass']);
try {
    $cmd = new PDO("$bd_driver:host=$bd_servidor;dbname=$bd_base;$charset", $bd_usuario, $bd_clave);
    //manipular
    $sql = "SELECT id_usuario,login,clave, CONCAT(nombre1, ' ', apellido1) as nombre FROM seg_usuarios  WHERE login='$usuario'";
    $rs = $cmd->query($sql);
    $obj = $rs->fetch();
    if ($obj['login'] === $usuario && $obj['clave'] === $contrasena) {
        $_SESSION['id_user'] = $obj['id_usuario'];
        $_SESSION['user'] = $obj['nombre'];
        $res['mensaje'] = 1;
    } else {
        $res['mensaje'] = 0;
    }
    $cmd = null;
} catch (PDOException $e) {
    $res['mensaje'] = $e->getCode() == 2002 ? 'Sin Conexión a Mysql (Error: 2002)' : 'Error: ' . $e->getCode();
}
echo json_encode($res);

