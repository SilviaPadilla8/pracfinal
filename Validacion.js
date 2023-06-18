function validarFormulario() {
    // Obtener los valores de los campos
    var nombre = document.getElementById("nombre").value;
    var apellido1 = document.getElementById("apellido1").value;
    var apellido2 = document.getElementById("apellido2").value;
    var email = document.getElementById("email").value;
    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;

    // Validar el formato de correo electrónico
    var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!emailRegex.test(email)) {
        alert("El formato de correo electrónico no es válido.");
        return false;
    }

    // Validar la longitud de la contraseña
    if (password.length < 4 || password.length > 8) {
        alert("La contraseña debe tener entre 4 y 8 caracteres.");
        return false;
    }

    // Validaciones adicionales si es necesario

    return true;
}