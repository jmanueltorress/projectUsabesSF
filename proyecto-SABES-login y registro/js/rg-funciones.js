function comprobarClave(){
    userpassword1 = document.f1.userpassword1.value
    userpassword2 = document.f1.userpassword2.value
  
      if (userpassword1 == userpassword2)
         alert("Registro completo\nRedirigiendolo a Inicio de Sesión")
         
      else
         alert("Algo salio mal ...\nVerifique sus credenciales")
  }