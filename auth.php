<?php
session_start();


require_once __DIR__ . '/conexion.php';
$accion = $_GET["accion"] ?? NULL;

if ($accion === "registro") {
    registrarUsuario($conn);
}

if ($accion === "login") {
    loginUsuario($conn);
}

function registrarUsuario($conn) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $valida = $conn->prepare("SELECT email FROM usuarios WHERE email = ?");
        $valida->bind_param("s", $email);
        $valida->execute();
        $valida->store_result();

        if ($valida->num_rows > 0) {
            header("Location: login-registro.html?error=correo_existente");
            exit;
        }


        $sql = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $nombre, $email, $hash);

        if ($sql->execute()) {
            header("Location: login-registro.html?msg=registro_ok");
        } else {
            header("Location: login-registro.html?error=registro_fallo");
        }
        exit;
    }
}


function loginUsuario($conn) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST["email"];
        $pass = $_POST["password"];

        $sql = $conn->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();

        $resultado = $sql->get_result();

        if ($resultado->num_rows === 1) {

            $usuario = $resultado->fetch_assoc();

            if (password_verify($pass, $usuario["password"])) {

                $_SESSION["id"] = $usuario["id"];
                $_SESSION["nombre"] = $usuario["nombre"];
                $_SESSION["email"] = $email;
                $_SESSION["usuario"] = $usuario["nombre"];

                header("Location: inicio.php");
                exit;

            } else {
                header("Location: login-registro.html?error=contrasena_incorrecta");
                exit;
            }

        } else {
            header("Location: login-registro.html?error=correo_no_existe");
            exit;
        }
    }
}

?>
