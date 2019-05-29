<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['id_product'])  && isset($_POST['quantity']) && !empty($_POST['id_product']) && !empty($_POST['quantity'])) {

		print_r($_POST);
		
		$id_product = $_POST['id_product'];
		$quantity = $_POST['quantity'];
		$user_id = $_SESSION['user']['id'];

		$valor = getPriceProduct($conn, $id_product);

		$total = $valor[0]['price']*$quantity;

		$sql_insert = "INSERT INTO orders
		(id_product, quantity, total, id_user)
		VALUES ('$id_product','$quantity', '$total', '$user_id')";

		echo $sql_insert;
		$conn->query($sql_insert);

		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('../cliente.php');
		}
	} else {
		redirect('../cliente.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../cliente.php');
}