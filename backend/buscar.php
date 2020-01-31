<?php

$mysqli = new mysqli("localhost", "root", "Admin09", "ejemplo");
$salida = "";

$query = "SELECT * FROM productos";

if (isset($_POST['consulta'])) {
    $q = $_POST['consulta'];
    $query = "SELECT id, nombre, marca , modelo FROM productos WHERE nombre LIKE '%" . $q . "%' OR marca LIKE '%" .$q. "%' ";
}
  
$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {
    $salida .= "
                   <table class='table table-bordered mt-2'>
                     <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Modelo</th>
                         <th>Marca</th>
                      </tr>
                    </thead>
                   <tbody>
                   ";

    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $salida .= "
                    <tr>
                        <td>" . $fila['id'] . "</td>
                        <td>" . $fila['nombre'] . "</td>
                        <td>" . $fila['modelo'] . "</td>
                        <td>" . $fila['marca'] . "</td>
                    </tr>
                        ";
    }

    $salida .= "
                    </tbody>
                 </table>            
                              ";
} else {
    $salida .= "no hay datos";
    $mysqli->close();
}


echo $salida;
