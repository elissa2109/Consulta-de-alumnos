<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado de Registro </title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="card-container">
    <div class="card-header">
      <h2>Estado del Registro</h2>
      <p>Sistema escolar UPEMOR</p>
    </div>

    <div class="result-box">
      <?php
        // 1. Incluir archivo de conexión
        include("conexion.php");

        // 2. Verificar que los datos vienen del formulario
        if (isset($_POST['nombre']) && isset($_POST['matricula'])) {
            $nombre = $_POST['nombre'];
            $matricula = $_POST['matricula'];

            // 3. Insertar en la base de datos (¡Asegúrate de que 'alumnos', 'matricula' y 'nombre' coincidan con tus tablas!)
            $sql = "INSERT INTO alumnos (matricula, nombre) VALUES ('$matricula', '$nombre')";
            
            if (mysqli_query($conexion, $sql)) {
                echo "<div class='alert alert-success' style='margin-bottom:15px;'>¡Alumno registrado con éxito!</div>";
                echo "<p class='result-text'>Se guardó a <span class='student-name'>" . htmlspecialchars($nombre) . "</span> con la matrícula <strong>" . htmlspecialchars($matricula) . "</strong>.</p>";
            } else {
                echo "<p class='result-text' style='color: red;'>Error al registrar: " . mysqli_error($conexion) . "</p>";
            }
        } else {
            echo "<p class='result-text'>No se recibieron datos.</p>";
        }
      ?>
    </div>

    <!-- Botones de navegación -->
    <div class="action-buttons" style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
      <a href="index.html" class="btn-primary" style="text-decoration: none; display: inline-block; text-align: center;">Ir a Buscar</a>
      <a href="registrar.html" class="btn-secondary" style="text-decoration: none; display: inline-block; text-align: center;">Registrar otro</a>
    </div>
  </div>

</body>
</html>