window.onload = function() {
  console.log("Javascript cargado");
  document.querySelector("#login").onclick = function() {
      console.log("Has pulsado el boton");
      let usuario = document.querySelector("#usuario").value;
      let contrasena = document.querySelector("#contrasena").value;
      console.log(usuario, contrasena);
      let envio = { "usuario": usuario, "contrasena": contrasena };
      console.log(envio);
      
      // Usar fetch con POST y enviar los datos en formato JSON
      fetch("../servidor/loginusuario.php", {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify(envio), // Convertir el objeto en JSON
      })
      .then(response => response.json()) // Convertir la respuesta a JSON
      .then(data => {
          console.log('Success:', data); // Mostrar la respuesta en la consola
      })
      .catch(error => console.error('Error:', error)); // Manejo de errores
  }
}
