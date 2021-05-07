<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="./images/form-removebg-preview.png" />
    <!--Importando Bootstrap / JQuery / CSS-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Form Factory</title>
</head>
<body>
<?php require_once './screens/php/collect_vals.php' ?>
<?php 
    if (isset($_SESSION['user'])):
        unset($_SESSION['user']);                      //verificando usuário na sessão
?> 
<?php endif; ?>
    <div class="home-box custom-box">
        <h1>Form Factory</h1>                             <!--Links para demais páginas-->
        <p>Crie e responda questionários sobre os mais diversos assuntos</p>
        <br>
        <h5>Entre com seu nome de usuário (este nome ficará registrado nos questionários que você criar)</h5>
        <form action="./screens/php/collect_vals.php" method="POST">
        <input type="text" class="input-input" name="user" autocomplete="off" required>
        <a href="./screens/php/home.php"><button type="submit" class="btn btn-info" name="enter" >Entrar</button></a>
        </form>
    </div>
</body>
</html>