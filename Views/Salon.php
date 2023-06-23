<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/DemasEstilos.css">
    <title>Salones</title>
</head>

<body>
<nav>
        <div class="profile-pic">
            <img src="../Fotos/Logo.jpg" alt="Foto de perfil">
        </div>
        <ul>
        <li><a href="../index.php">Home</a></li>
          <li><a href="Persona.php">Persona</a></li>
          <li><a href="Asignatura.php">Asignatura</a></li>
          <li><a href="Salon.php">Salón</a></li>
          <li><a href="Calificacion.php">Calificacion</a></li>
          <li><a href="Matricula.php">Matricula</a></li>
        </ul>
        <div class="login-btn">
            <a class="btn-login" href="/Views/login.php">Iniciar sesión</a>
        </div>
    </nav>

    <div class="formulario">
      <form action="../Controller/SalonController.php" method="POST">
        <!-- Aquí van los campos del formulario -->
        <input type="text" name="idsalon" placeholder="ID Salon">
        <input type="text" name="nombre" placeholder="Nombre"  require>
        <input type="text" name="cantidad" placeholder="Cantidad"require>
      
        <div class="boton">
          <button class="agregar" name="agregar">Agregar</button>
          <button class="actualizar" name="actualizar">Actualizar</button>
          <button class="eliminar" name="eliminar">Eliminar</button>
        </div>
      </form>
    </div>
    
    <div class="content">
        <div class="table-container">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
              <tbody>
              <?php
                include_once("../core/config.php");
                include("../Models/SalonModel.php");
                // Crear una instancia de SalonModel y pasar la conexión como parámetro al constructor
                $salonModel = new SalonModel($conn);
                // Obtener todos los datos de las personas
                $salones = $salonModel->getAllData();

                // Recorrer los datos y generar las filas de la tabla
                foreach ($salones as $salones) {
                  echo "<tr>";
                  echo "<td>" . $salones['sal_id'] . "</td>";
                  echo "<td>" . $salones['sal_nombre'] . "</td>";
                  echo "<td>" . $salones['sal_cantidad'] . "</td>";
                  echo "</tr>";
                }

                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
          
    </div>
    <footer class="footer">
        <p>&copy; 2023 - Todos los derechos reservados</p>
    </footer>
</body>

</html>
