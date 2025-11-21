<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'brasil';

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
$conn->select_db($db);

$conn->set_charset('utf8mb4');


$conn->query("CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");


$conn->query("CREATE TABLE IF NOT EXISTS platillo (
  id_platillo INT AUTO_INCREMENT PRIMARY KEY,
  nombre_platillo VARCHAR(150) NOT NULL,
  tipo_cocina VARCHAR(100) NOT NULL,
  descripcion TEXT NULL,
  categoria VARCHAR(100) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

$conn->query("CREATE TABLE IF NOT EXISTS recomendacion_platillo (
  id_recomendacion INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  id_platillo INT NOT NULL,
  motivo TEXT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  KEY idx_rec_user (id_usuario),
  KEY idx_rec_platillo (id_platillo),
  CONSTRAINT fk_rec_user FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_rec_platillo FOREIGN KEY (id_platillo) REFERENCES platillo(id_platillo) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

?>
