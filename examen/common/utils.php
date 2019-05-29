<?php 
session_start();


$conn = new mysqli('localhost', 'root', '', 'examen');

if($conn->connect_error) {
	echo 'Existió un error en la conexión ' . $conn->connect_error;
	exit;
}

function redirect($url) {
	header('Location: ' . $url);
	exit;
}

function getProducts($conn) {

	$sql = "SELECT *
		FROM products";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$products = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$products[] = $row;
			}
		}

		return $products;
}

function getOrders($conn) {

	$sql = "SELECT o.quantity, o.total, p.name as name_product, u.name as name_user 
		FROM orders o 
			INNER JOIN products p ON o.id_product = p.id 
			INNER JOIN user u ON o.id_user = u.id";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$stores = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$stores[] = $row;
			}
		}

		return $stores;
}

function getPriceProduct($conn, $id_product) {

	$sql = "SELECT *
		FROM products
		WHERE id = '$id_product'";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../cliente.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$products = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$products[] = $row;
			}
		}

		return $products;
}

if ($_SERVER['SCRIPT_NAME'] != '/examen/index.php' && $_SERVER['SCRIPT_NAME'] != '/examen/php/process_login.php' && $_SERVER['SCRIPT_NAME'] != '/examen/php/process_registration.php' && !isset($_SESSION['user'])) {
	redirect($_SERVER["HTTP_HOST"] . 'examen/index.php');
} elseif( $_SERVER['SCRIPT_NAME'] == '/examen/index.php' && isset($_SESSION['user']) ) {
	if($_SESSION['user']['role'] === 'Administrador'){
		redirect($_SERVER["HTTP_HOST"] . 'examen/admin.php');
	}else{
		redirect($_SERVER["HTTP_HOST"] . 'examen/cliente.php');
	}
	
}

