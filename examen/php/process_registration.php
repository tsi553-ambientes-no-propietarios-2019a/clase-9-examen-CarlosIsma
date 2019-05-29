<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['name']) && isset($_POST['role']) && isset($_POST['username'])&& isset($_POST['password']) && isset($_POST['password_confirm']) && !empty($_POST['name']) && !empty($_POST['role'])&& !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {

		$name = $_POST['name'];
		$role = $_POST['role'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];

		if($password === $password_confirm){
			$sql_insert = "INSERT INTO user
										(name, role, username, password)
							VALUES ('$name','$role','$username', MD5('$password'))";

			echo $sql_insert;
			$conn->query($sql_insert);
		}else{
			redirect('../registro.php?error_message=Por favor verificar, las contraseñas no coinciden.');
		}
		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('../index.php');
		}
	} else {
		redirect('../registro.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../registro.php');
}