<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>
<?php
include 'conexion.php';
$res = array();
$idUsuer = $_SESSION['id_user'];
try {
    $cmd = new PDO("$bd_driver:host=$bd_servidor;dbname=$bd_base;$charset", $bd_usuario, $bd_clave);
    //manipular
    $sql = "
        SELECT id_vigencia,anio,seg_empresas.nombre
        FROM
        `contable`.`con_vigencias`
        INNER JOIN `contable`.`seg_empresas` 
            ON (`con_vigencias`.`id_empresa` = `seg_empresas`.`id_empresa`)
        INNER JOIN `contable`.`seg_usuarios` 
            ON (`seg_usuarios`.`id_empresa` = `seg_empresas`.`id_empresa`)
        WHERE id_usuario = '$idUsuer'
        GROUP BY id_vigencia";
    $rs = $cmd->query($sql);
    $obj = $rs->fetchAll();
    $cmd = null;
} catch (PDOException $e) {
    $res['mensaje'] = $e->getCode() == 2002 ? 'Sin Conexión a Mysql (Error: 2002)' : 'Error: ' . $e->getCode();
}
?>
<!DOCTYPE html>
<html lang="es">
    <?php include 'encabezado.php' ?>
    <body>
        <div id="divFondo">
            <div id="divLoginEstilo" class="container">
                <div class="row justify-content-center align-items-center minh-100">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Colocar Logotipo</h3></div>
                            <div class="card-body">
                                <form id="formVigencia">
                                    <div class="form-group">
                                        <label class="small mb-1" for="slcEmpresa">Empresa</label>
                                        <select id="slcEmpresa" name="slcEmpresa" class="form-select" aria-label="Default select example">
                                            <option selected value="0">--Elegir Empresa--</option>
                                            <?php 
                                                foreach($obj as $o){
                                                    $nomEmpresa = $o['nombre'];
                                                }
                                                echo '<option value="1">' .$nomEmpresa. '</option>';
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="small mb-1" for="slcVigencia">Vigencia</label>
                                        <select id="slcVigencia" name="slcVigencia" class="form-select" aria-label="Default select example">
                                            <option selected value="0">--Elegir Vigencia--</option>
                                            <?php
                                            foreach ($obj as $o) {
                                                echo '<option value="' . $o["id_vigencia"] . '">' . $o["anio"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" id="btnEntrar">Entrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="divModalErrorEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="divModalHeader">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            ¡Error!
                        </h5>
                    </div>
                    <div class="modal-body text-center">
                        Debe seleccionar la empresa.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="btnCerrarModalEmpresa">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="divModalErrorVigencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="divModalHeader">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            ¡Error!
                        </h5>
                    </div>
                    <div class="modal-body text-center">
                        Debe selecionar una vigencia.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="btnCerrarModalVigencia">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </body>
</html>