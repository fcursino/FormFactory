<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../../images/form-removebg-preview.png" />
    <!--Importando Bootstrap / JQuery / CSS-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Home</title>
</head>
<body>
<?php require_once 'collect_vals.php' ?>
    <?php 
    if (isset($_SESSION['message'])): 
    ?>                                      
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];                      //exibindo notificação(sucesso, alerta ou erro)
        unset($_SESSION['message']);
    ?>
    </div>
    <?php endif; ?>
    <div class="home-box custom-box">
        <h1>Form Factory</h1>                             <!--Links para demais páginas-->
        <p>Crie e responda questionários sobre os mais diversos assuntos</p>
        <a href="create.php"><button type="button" class="btn btn-info">Criar Questionário</button></a>
        <a href="list.php"><button type="button" class="btn btn-info">Responder Questionário</button></a>
        <a href="../../index.php"><button type="button" class="btn btn-info">Sair</button></a>
    </div>
</body>
</html>