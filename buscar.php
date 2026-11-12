<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado de Búsqueda</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="card-container">
    <div class="card-header">
      <h2>Resultado de Búsqueda</h2>
      <p>Consulta en el sistema escolar</p>
    </div>

    <!-- Alerta de éxito -->
    <div class="alert alert-success">
      ¡Conexión exitosa!
    </div>

    <div class="result-box">
      <?php
        // 1. Incluyes tu archivo de conexión a la base de datos (ej. conexion.php)
        include("conexion.php");

        // 2. Verificas que se haya enviado la matrícula desde el formulario
        if (isset($_POST['matricula'])) {
            $matricula = $_POST['matricula'];

            // 3. Haces la consulta SQL buscando la matrícula en tu tabla
            $sql = "SELECT nombre FROM alumnos WHERE matricula = '$matricula'";
            $resultado = mysqli_query($conexion, $sql);

            // 4. Comprobar si el alumno existe en la base de datos
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $row = mysqli_fetch_assoc($resultado);
                $nombreAlumno = $row['nombre'];

                echo "<p class='result-text'>El alumno con matrícula <strong>" . htmlspecialchars($matricula) . "</strong> es: <br><span class='student-name'>" . htmlspecialchars($nombreAlumno) . "</span></p>";
            } else {
                echo "<p class='result-text'>No se encontró ningún alumno con la matrícula <strong>" . htmlspecialchars($matricula) . "</strong>.</p>";
            }
        } else {
            echo "<p class='result-text'>No se ingresó ninguna matrícula.</p>";
        }
      ?>
    </div>

    <div class="card-footer">
      <!-- Enlace para regresar al formulario principal -->
      <a href="index.html" class="btn-secondary">Volver al formulario</a>
    </div>
  </div>

</body>
</html>