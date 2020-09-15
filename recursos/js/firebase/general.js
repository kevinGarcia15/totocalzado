$(() => {
  $('.tooltipped').tooltip({ delay: 50 })
  $('.modal').modal()

  // TODO: Adicionar el service worker

  // Init Firebase nuevamente
  firebase.initializeApp(firebaseConfig);

  // TODO: Firebase observador del cambio de estado
  firebase.auth().onAuthStateChanged(user => {
    if (user) {
//      $('#btnInicioSesion').text('Salir')
      if (user.photoURL) {
//        $('#avatar').attr('src', user.photoURL)
      }else {
//        $('#avatar').attr('src', 'https://totocalzado.com/recursos/img/usuario_auth.png')
      }
    }else {
//      $('#btnInicioSesion').text('Iniciar Sesión')
//      $('#avatar').attr('src', 'https://totocalzado.com/recursos/img/user-icon.png')
    }
  })

//signout
  $('#salir').click(() => {
    firebase.auth().signOut()
    .then(()=>{
//      $('#avatar').attr('src', 'https://totocalzado.com/recursos/img/user-icon.png')
        Materialize.toast(`SignOut correcto`, 4000)

        var request = $.ajax({
          method: "POST",
          url: "https://totocalzado.com/loggin/logout",
        });
        request.done(function(){
          console.log('sesion destruida')
          window.setTimeout(()=>{window.location.href='/'},2000)
        });
    })
    .catch(error => {
      Materialize.toast(`Error SignOut ${error}`, 4000)
    })
    //$('#avatar').attr('src', 'imagenes/usuario.png')
    //Materialize.toast(`SignOut correcto`, 4000)
  })
})
