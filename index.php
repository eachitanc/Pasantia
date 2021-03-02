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
                                <form id="formLogin">
                                    <div class="form-group">
                                        <label class="small mb-1" for="txtUser">Usuario</label>
                                        <input class="form-control py-2" id="txtUser" name="txtUser" type="text" placeholder="Ingresar usuario" />
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="small mb-1" for="txtPassword">Contraseña</label>
                                        <input class="form-control py-2" id="txtPassword" name="txtPassword" type="password" placeholder="Ingresar Contraseña" />
                                    </div>
                                    <br>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="#">Ovidó la contraseña?</a>
                                        <button class="btn btn-primary" id="btnLogin">Iniciar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small">Bienvenido a SofCon</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Modal -->
        <div class="modal fade" id="divModalErrorDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        Usuario y/o Contraseña incorrectos.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="btnCerrarModal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="divModalErrorVacio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        Debe Ingresar Usuario y contraseña.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-sm" id="btnCerrarModalVacio">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>