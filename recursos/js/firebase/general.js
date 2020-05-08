$(() => {
  $('.tooltipped').tooltip({ delay: 50 })
  $('.modal').modal()

  // TODO: Adicionar el service worker

  // Init Firebase nuevamente
  firebase.initializeApp(firebaseConfig);

  // TODO: Firebase observador del cambio de estado
  firebase.auth().onAuthStateChanged(user => {
    if (user) {
      $('#btnInicioSesion').text('Salir')
      if (user.photoURL) {
        $('#avatar').attr('src', user.photoURL)
      }else {
        $('#avatar').attr('src', './recursos/img/usuario_auth.png')
      }
    }else {
      $('#btnInicioSesion').text('Iniciar Sesión')
      $('#avatar').attr('src', './recursos/img/user-icon.png')
    }
  })

  // TODO: Evento boton inicio sesion
  $('#btnInicioSesion').click(() => {
    const user = firebase.auth().currentUser
    if (user) {
      $('#btnInicioSesion').text('Iniciar Sesión')
      return firebase.auth().signOut()
        .then(() =>{
          $('#avatar').attr('src', './recursos/img/user-icon.png')
            Materialize.toast(`SignOut correcto`, 4000)
        //destruir variable de session de php
        var request = $.ajax({
          method: "POST",
          url: "http://localhost/totocalzado/loggin/logout",
        });
        request.done(function(){
          console.log('sesion destruida')
//          window.setTimeout(()=>{window.location.href='/totocalzado'},500)
        });
      }).catch(error =>{
        Materialize.toast(`Error al realizar SignOut => ${error}`, 4000)
      })
    }
    //$('#avatar').attr('src', 'imagenes/usuario.png')


    $('#emailSesion').val('')
    $('#passwordSesion').val('')
  })
//signout
  // $('#avatar').click(() => {
  //   firebase.auth().signOut()
  //   .then(()=>{
  //     $('#avatar').attr('src', './recursos/img/user-icon.png')
  //       Materialize.toast(`SignOut correcto`, 4000)
  //
  //       var request = $.ajax({
  //         method: "POST",
  //         url: "http://localhost/totocalzado/loggin/logout",
  //       });
  //       request.done(function(){
  //         console.log('sesion destruida')
  //         window.setTimeout(()=>{window.location.href='/totocalzado'},2000)
  //       });
  //   })
  //   .catch(error => {
  //     Materialize.toast(`Error SignOut ${error}`, 4000)
  //   })
  //   //$('#avatar').attr('src', 'imagenes/usuario.png')
  //   //Materialize.toast(`SignOut correcto`, 4000)
  // })
})
