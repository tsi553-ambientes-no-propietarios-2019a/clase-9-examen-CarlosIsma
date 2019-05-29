<?php 
include('common/utils.php');
//print_r($_SESSION['user']);

$products = getProducts($conn);
$orders = getOrders($conn);
/*$user_id = $_SESSION['user']['id'];
$comments = getComment($conn, $user_id);*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div><a href="php/logout.php">Cerrar sesión</a></div>

	<h1>Bienvenido <?php echo $_SESSION['user']['username']; ?></h1>
	<h2>Rol: <?php echo $_SESSION['user']['role']; ?></h2>

	<a href="new_product.php">Añadir producto</a>

	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Producto</th>
				<th>Precio</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($products as $p) { ?>
				<tr>
					<td><?php echo $p['id'] ?></td>
					<td><?php echo $p['name'] ?></td>
					<td><?php echo $p['price'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

<h2>Pedidos disponibles: </h2>

<table>
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Producto</th>
				<th>Cantidad pedida</th>
				<th>Total a pagar</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($orders as $o) {?>
				<tr>
					<td><?php echo $o['name_user'] ?></td>
					<td><?php echo $o['name_product'] ?></td>
					<td><?php echo $o['quantity'] ?></td>
					<td><?php echo $o['total'] ?></td>
				</tr>
			<?php } ?>
</tbody>
	</table>

</body>
</html>