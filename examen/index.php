<?php
include('common/utils.php')
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <form action="php/process_login.php" method="post">
        <input type="text" name="username" placeholder="Usuario">
        <input type="password" name="password" placeholder="Clave">
        <button>Ingresar</button>

        <a href="registro.php">Registrarme</a>
    </form>
</body>
</html>
