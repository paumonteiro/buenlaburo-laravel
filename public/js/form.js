window.addEventListener("load",function(){


  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }



  var miForm = document.querySelector("form");
  //console.log(miForm);
  var errores = [];

  miForm.addEventListener("submit", function(e){
      e.preventDefault();

      var inputName = document.querySelector("#name");
      if(inputName.value.length < 5){
        errores.push("Nombre incorrecto")
      }

      var inputEmail = document.querySelector("#email").value;
      if(validateEmail(inputEmail) == false){
        errores.push("Mail incorrecto")
        alert("mail incorrecto")
      }

      var inputPass = document.querySelector("#password").value;
      var inputPassConfirm = document.querySelector ("#password-confirm").value;
      if (inputPass.length < 6) {
        errores.push("La contraseña es muy corta")
        alert("La contraseña es muy corta")
      }
      if (inputPass !== inputPassConfirm) {
        errores.push("Las contraseñas no coinciden")
        alert("Las contraseñas no coinciden")
      }

      if(errores.length == 0){
        miForm.submit();
      } else {
          console.log("hay errores");
          console.error(errores);

          var divErrores = document.querySelector(".errores");
          errores.forEach(function(error){
            var cadaError = document.createElement("p");
            cadaError.innerText = error;
            divErrores.append(cadaError);
          })
      }
  });

});
