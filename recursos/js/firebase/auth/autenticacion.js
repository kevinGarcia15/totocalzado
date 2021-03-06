class Autenticacion {
  autEmailPass (email, password) {
    firebase.auth().signInWithEmailAndPassword(email, password)
      .then(result =>{
        if (result.user.emailVerified) {
            Materialize.toast(`Bienvenido ${result.user.displayName}, te estamos redirigiendo`, 5000)
            //variables de sesion en php
            let nombre = result.user.displayName
            let rol = 'usuario'
            let user_photo = 'https://totocalzado.com/recursos/img/usuario_auth.png'
            let uid = result.user.uid
            this.getPhpSession(nombre, rol, user_photo,uid)
        }else {
          firebase.auth().signOut()
          Materialize.toast(`por favor realiza la verificación de la cuenta en tu correo electronico, esto puede tardar unos minutos`, 5000)
        }
      })
      .catch(error =>{
        console.error(error);
        Materialize.toast(`Error al autenticar, revise su correo o contraseña!! `, 4000)
      })
    $('.modal').modal('close')

  }

  crearCuentaEmailPass (email, password, nombres) {
    firebase
      .auth()
      .createUserWithEmailAndPassword(email, password)
      .then(result =>{
        result.user.updateProfile({
          displayName : nombres
        })

        const configuracion = {
          url:'https://totocalzado.com/Loggin'
        }

        result.user.sendEmailVerification(configuracion).catch(error =>{
          console.error(error)
          Materialize.toast(error.message, 4000)
        })

        firebase.auth().signOut()

        Materialize.toast(
          `Bienvenido ${nombres}, debes realizar el proceso de verificación en tu correo electronico, esto puede tardar unos minutos`,
          4000
      )
      console.log('bienvenido, realiza la verificacion en tu correo')
      window.setTimeout(()=>{window.location.href='/'},4000)

      })
      .catch(error =>{
        console.error(error)
        Materialize.toast(error.message, 4000)
      })
  }

  authCuentaGoogle () {
    const provider = new firebase.auth.GoogleAuthProvider()//nombre del proveedor de autenticación

    firebase.auth().signInWithPopup(provider)
    .then(result => {
//      $('#avatar').attr('src', result.user.photoURL)
      $('.modal').modal('close')
      Materialize.toast(`Bienvenido ${result.user.displayName} !! `, 4000)

      //variables de sesion en php
      let nombre = result.user.displayName
      let rol = 'usuario'
      let user_photo = result.user.photoURL
      let uid = result.user.uid
      this.getPhpSession(nombre, rol, user_photo,uid)
      console.log(uid)
    })
    .catch(error =>{
      console.error(error);
      Materialize.toast(`Error al autenticar usuario con google: Por favor vuelve a intentarlo!! `, 4000)
    })
  }

  authCuentaFacebook () {
    const provider = new firebase.auth.FacebookAuthProvider()//nombre del proveedor de autenticación

    firebase.auth().signInWithPopup(provider)
    .then(result => {
//      $('#avatar').attr('src', result.user.photoURL)
      $('.modal').modal('close')
      Materialize.toast(`Bienvenido ${result.user.displayName} !! `, 4000)

      //establece variables de sesion en php
      //variables de sesion en php
      let nombre = result.user.displayName
      let rol = 'usuario'
      let user_photo = result.user.photoURL
      let uid = result.user.uid
      console.log(uid)
      this.getPhpSession(nombre, rol, user_photo,uid)
    })
    .catch(error =>{
      console.error(error);
      Materialize.toast(`Error al autenticar usuario con facebook:Por favor vuelve a intentarlo!! `, 4000)
    })

  }

  //funcion para establecer variable de sesion en php
  getPhpSession(nombre,rol,user_photo,uid){
    var request = $.ajax({
      method: "POST",
      url: "https://totocalzado.com/loggin/loggin",
      data: {
            usuario: nombre,
            rol: rol,
            user_photo: user_photo,
            uid: uid,
          }
    });
    request.done(function(){
      console.log('variables de sesión establecidas')
    });
    window.setTimeout(()=>{window.location.href='/'},3000)
  }
}
