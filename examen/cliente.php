<?php 
include('common/utils.php');
//print_r($_SESSION['user']);

if($_GET) {
	if(isset($_GET['error_message'])) {
		$error_message = $_GET['error_message'];
	}
}

$products = getProducts($conn);

?>

<?php if(isset($error_message)) { ?>
	<div><strong><?php echo $error_message; ?></strong></div>
<?php } ?>

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

	<form action="php/process_newOrder.php" method="post">
		<div>
			<label>Producto</label>
			<select name="id_product" required="required">
				<option value="">Seleccione...</option>
				<?php 
					foreach ($products as $p) { 
						echo '<option value="'.$p['id'].'">'.$p['name'].'</option>';
					} 
				?>
			</select>
		</div>
		<div>
			<label>Cantidad</label>
			<input type="text" name="quantity" required="required">
		</div>
		<div>
			<button>Ordenar</button>
		</div>
	</form>
</body>
</html>