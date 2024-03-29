<?php
ob_start();
require("../lib/page.php");

Page::header("Imagenes");
$id = $_GET['id'];

//consulta las campos donde estan las fotos (galeria)
$sql = "SELECT * FROM fotos_vehiculos, tipos_fotos WHERE tipos_fotos.codigo_tipo_foto = fotos_vehiculos.codigo_tipo_foto AND fotos_vehiculos.codigo_tipo_foto = 2 AND codigo_vehiculo = ?";
$params = array($id);
$data = Database::getRows($sql, $params);

if($data != null)
{
	print("
	<a href='save.php?id=$id' class='waves-effect waves-light btn'><i class='material-icons left'>add</i>Agregar imagenes</a> ");
?>

<!-- Encabezados de la tabla -->
<h3>Galeria</h3>
<table class='striped'>
	<thead>
		<tr>
			<th>IMAGEN</th>
			<th>TIPO</th>
		</tr>
	</thead>
	<tbody>


<?php
	//Empieza a llenarse la tabla
	foreach($data as $row)
	{
		print("
        
			<tr>
				<td><img src='data:image/*;base64,".$row['url_foto']."' class='materialboxed' width='100' height='100'></td>
				<td>".$row['tipo_foto']."</td>
				
				<td>
					<a href='save.php?id=".$row['codigo_vehiculo']."&img=".$row['codigo_foto']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['codigo_vehiculo']."&img=".$row['codigo_foto']."' class='red-text'><i class='material-icons'>delete</i></a>
				</td>
			</tr>
		");
	}
	print("
		</tbody>
	</table>

	");
} 

//consulta las campos donde estan las fotos (Slider)
$sql = "SELECT * FROM fotos_vehiculos, tipos_fotos WHERE tipos_fotos.codigo_tipo_foto = fotos_vehiculos.codigo_tipo_foto AND fotos_vehiculos.codigo_tipo_foto = 3 AND codigo_vehiculo = ?";
$params = array($id);
$data1 = Database::getRows($sql, $params);

//Encabezados de la tabla
if($data1 != null)
{
?>
<br size='10'>
<h3>Slider</h3>
<table class='striped'>
	<thead>
		<tr>
			<th>IMAGEN</th>
			<th>TIPO</th>
		</tr>
	</thead>
	<tbody>

<?php
	//muestra las fotos
	foreach($data1 as $row)
	{
		print("
        
			<tr>
				<td><img src='data:image/*;base64,".$row['url_foto']."' class='materialboxed' width='100' height='100'></td>
				<td>".$row['tipo_foto']."</td>
				
				<td>
					<a href='save.php?id=".$row['codigo_vehiculo']."&img=".$row['codigo_foto']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['codigo_vehiculo']."&img=".$row['codigo_foto']."' class='red-text'><i class='material-icons'>delete</i></a>
				</td>
			</tr>
		");
	}
	print("
		</tbody>
	</table>

	");
} //Fin de if que comprueba la existencia de registros.
else
{
	
}

if ($data==null && $data==null)´
{
	Page::showMessage(4, "No hay registros disponibles", "save.php?id=$id");
}

//muestra el footer
Page::footer();
?>

