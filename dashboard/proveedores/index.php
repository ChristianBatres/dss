<?php
ob_start();
require("../lib/page.php");
require("../../lib/zebra.php");
Page::header("Proveedores");

//valida si el post esta vacio para la busqueda
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM proveedores WHERE nombre_proveedor LIKE ? ORDER BY nombre_proveedor";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * FROM proveedores ORDER BY nombre_proveedor";
	$params = null;
}

//ejecuta la consulta
$data = Database::getRows($sql, $params);
//obtenemos el numero de filas y cantidad maxima
$num_registros = count($data); 
$resul_x_pagina = 10; 

//instanciando la clase y enviando parametros
$paginacion = new Zebra_Pagination(); 
$paginacion->records($num_registros); 
$paginacion->records_per_page($resul_x_pagina);

//Consulta utilizando limit
$consulta = $sql.' LIMIT '.(($paginacion->get_page() - 1) * $resul_x_pagina). ',' .$resul_x_pagina;
//ejecuta la consulta
$data = Database::getRows($consulta, $params);

if($data != null)
{
?>


<!-- Inicio del formulario -->
<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect green'><i class='material-icons'>check_circle</i></button> 	
		</div>
		<div class='input-field col s12 m4'>
			<a href='save.php' class='btn waves-effect indigo'><i class='material-icons'>add_circle</i></a>
		</div>
	</div>
</form>
<!-- Encabezados de la tabla -->
<table class='striped'>
	<thead>
		<tr>
			<th>EMPRESA</th>
			<th>CONTACTO</th>
			<th>TELEFONO</th>
			<th>DIRECCIÓN</th>
		</tr>
	</thead>
	<tbody>

<?php
	//se muestran las filas de registros
	foreach($data as $row)
	{
		print("
        
			<tr>
				<td>".$row['nombre_proveedor']."</td>
				<td>".$row['contacto_proveedor']."</td>
				<td>".$row['telefono_proveedor']."</td>
				<td>".$row['direccion_provedor']."</td>
				
				<td>
					<a href='save.php?id=".$row['codigo_proveedor']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['codigo_proveedor']."' class='red-text'><i class='material-icons'>delete</i></a>
					<a href='../pdf/proveedor.php?id=".$row['codigo_proveedor']."' class='green-text'><i class='material-icons'>description</i></a>
				</td>
			</tr>
		");
	}
	print("
		</tbody>
	</table>

	");
	$paginacion->render();
} //Fin de if que comprueba la existencia de registros.
else
{
	Page::showMessage(4, "No hay registros disponibles", "save.php");
}

//se muestra el footer
Page::footer();
?>