$(() => {
    const objAuth = new Autenticacion()

    $("#btnRegistroEmail").click(() => {
        const nombres = $('#nombreContactoReg').val();
        const email = $('#emailContactoReg').val();
        const password = $('#passwordReg').val();
        const auth = new Autenticacion()
        auth.crearCuentaEmailPass(email, password, nombres)
        // TODO : LLamar crear cuenta con email
    });

    $("#btnInicioEmail").click(() => {
        const email = $('#emailSesion').val();
        const password = $('#passwordSesion').val();
        const auth = new Autenticacion()
        auth.autEmailPass(email, password)
        // TODO : LLamar auth cuenta con email
    });

    $("#authGoogle").click(() => objAuth.authCuentaGoogle()); //AUTH con GOOGLE);

    $("#authFB").click(() => objAuth.authCuentaFacebook()); //AUTH con FACEBOOK);

    //$("#authTwitter").click(() => //AUTH con Twitter);

    $('#btnRegistrarse').click(() => {
        $('#modalSesion').modal('close');
        $('#modalRegistro').modal('open');
    });

    $('#btnIniciarSesion').click(() => {
      window.location.href='/totocalzado/loggin'
    });

});
