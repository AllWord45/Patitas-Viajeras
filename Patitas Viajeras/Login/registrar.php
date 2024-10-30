<?php 
include("con_db.php");  // Conexión a la base de datos

// Verificar si se ha enviado el formulario
if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $fechareg = date("d/m/y");
        
        // Insertar datos en la base de datos
        $consulta = "INSERT INTO datos(nombre, email, fecha_reg) VALUES ('$name','$email','$fechareg')";
        $resultado = mysqli_query($conex, $consulta);
        
        // Si la inserción es exitosa, redirigir a Google
        if ($resultado) {
            // Redirigir a Google
            header("Location: https://www.google.com");
            exit(); // Asegúrate de llamar a exit() después de header()
        } else {
            // Si hay un error, puedes manejarlo aquí
            $mensaje = "<h3 class='bad'>¡Ups, ha ocurrido un error!</h3>";
        }
    } else {
        $mensaje = "<h3 class='bad'>¡Por favor complete los campos!</h3>";
    }
}
?>