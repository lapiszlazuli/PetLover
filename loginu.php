<?php
session_start(); // Inicia la sesión

// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username_db = "root"; // Cambia esto si es necesario
$password_db = ""; // Cambia esto si es necesario
$dbname = "pet";

// Crear conexión
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén el nombre del usuario del formulario y valida
    $username = trim($_POST['username']);
    
    // Validación básica del nombre de usuario
    if (!empty($username)) {
        // Escapar el nombre de usuario para evitar inyecciones SQL
        $username = $conn->real_escape_string($username);
        
        // Consulta a la base de datos para verificar si el usuario existe
        $sql = "SELECT nombre FROM usuarios WHERE nombre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Usuario válido, almacenar en la sesión
            $_SESSION['username'] = htmlspecialchars($username); 
            header("Location: index.php"); // Redirige a la página principal
            exit();
        } else {
            echo "Nombre de usuario no encontrado.";
        }
        
        $stmt->close();
    } else {
        echo "El nombre de usuario no puede estar vacío.";
    }
} else {
    // Si el formulario no se ha enviado, redirige al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

$conn->close(); // Cierra la conexión
?>
