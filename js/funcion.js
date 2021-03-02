$(function ($) {

    var height = $(window).height();
    $('#divLoginEstilo').height(height);

    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    $("#btnLogin").click(function () {
        var user = $("#txtUser").val();
        var pass = $("#txtPassword").val();
        if (user === "" || pass === "") {
            $('#divModalErrorVacio').modal('show');
        } else {
            pass = hex_sha512(pass);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'validarLogin.php',
                data: {user: user, pass: pass}
            }).done(function (res) {
                if (res.mensaje === '1') {
                    window.location = "/contable/vigencia.php";
                } else {
                    $('#divModalErrorDatos').modal('show');
                    /*$('#divError').show();
                     setTimeout(function () {
                     $('#divError').hide();
                     }, 1500);*/
                }
            });
        }
        return false;
    });

    $("#btnCerrarModal").click(function () {
        $('#divModalErrorDatos').modal('hide');
    });
    $("#btnCerrarModalVacio").click(function () {
        $('#divModalErrorVacio').modal('hide');
    });
    $("#btnCerrarModalVigencia").click(function () {
        $('#divModalErrorVigencia').modal('hide');
    });
    $("#btnCerrarModalEmpresa").click(function () {
        $('#divModalErrorEmpresa').modal('hide');
    });

    $("#btnEntrar").click(function () {
        var emp = $("#slcEmpresa").val();
        var vig = $("#slcVigencia").val();
        if (emp === '0') {
            $('#divModalErrorEmpresa').modal('show');
        }
        if (vig === '0') {
            $('#divModalErrorVigencia').modal('show');
        }
        if (emp !== '0' && vig !== '0') {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'variableHome.php',
                data: {vig: vig}
            }).done(function (res) {
                if (res === 1) {
                    window.location = "home.php";
                }
            });
        }
        return false;
    });
    //Editar usuario
    $("#btnCerrarModal").click(function () {
        $('#divModalErrorDatos').modal('hide');
    });

});
