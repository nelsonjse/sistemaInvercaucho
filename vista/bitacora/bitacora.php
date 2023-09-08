<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con Búsqueda en PHP</title>
    <link rel="stylesheet" href="vista/assets/css/bitacora.css">
   
</head>
<body>
    <h2 class="text-align: center">Bitacora</h2>
    

    <input type="text" id="myInput" onkeyup="buscar()" placeholder="Buscar por Usuario">

    <table id="myTable">
        <tr>
            <th>Usuario</th>
            <th>Fecha Entrada</th>
            <th>Hora Entrada</th>
            <th>Fecha Salida</th>
            <th>Hora Salida</th>
            
        </tr>
        
        <?php
        
        foreach ($values->registros as $registro) {
            echo "<tr>";
            echo "<td>" . $registro->nombres . "</td>";
            echo "<td>" . $registro->fechaEntrada . "</td>";
            echo "<td>" . $registro->horaEntrada . "</td>";
            echo "<td>" . $registro->fechaSalida . "</td>";
            echo "<td>" . $registro->horaSalida . "</td>";
            
            echo "</tr>";
        }
        ?>
    </table>

    <script type="text/javascript" src="js/bitacora.js"></script>
</body>
</html>
