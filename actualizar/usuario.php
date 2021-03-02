<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
include '../conexion.php';
$usuario = $_SESSION['id_user'];
$cmd = new PDO("$bd_driver:host=$bd_servidor;dbname=$bd_base;$charset", $bd_usuario, $bd_clave);
$sql = "SELECT * FROM seg_usuarios  WHERE login='$usuario'";
$rs = $cmd->query($sql);
$obj = $rs->fetch();
include '../navbar.php'?>  
                <h3 class="text-md-center p-2">Actulizar Usuario</h3>
                <div class="container-fluid p-3">
                    <form>
                        <input type="number" id="numIdUsuario" name="numIdUsuario" value="<?php echo $usuario ?>" hidden>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="txtNombre1">Nombres </label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="txtNombre1" placeholder="Primer nombre">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="txtNombre2" placeholder="Segundo nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txtApellido1">Apellidos </label>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="txtApellido1" name="txtApellido1" value="" placeholder="Primer apellido">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="txtApellido2" name="txtApellido2" value="" placeholder="Segundo apellido">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">                                    <label for="txtUsuario">Usuario</label>
                                <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario">
                            </div>
                            <div class="form-group col-md-9">
                                <label for="emailUsuario">Correo</label>
                                <input type="email" class="form-control" id="emailUsuario" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">                                    <label for="txtUsuario">Usuario</label>
                                <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario">
                            </div>
                            <div class="form-group col-md-9">
                                <label for="emailUsuario">Correo</label>
                                <input type="email" class="form-control" id="emailUsuario" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Actualizar</button>
                    </form>
                </div>
<?php include '../complemento.php' ?>
