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
    <title>Questionários</title>
</head>
<body>
<?php require_once 'collect_vals.php' ?>
    <?php 
    if (isset($_SESSION['message'])): 
    ?>                                      
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>
    <?php endif; ?>
    <div class="home-box custom-box">
        <h1>Form Factory</h1>
        <h3>Respostas de Questionário</h3>
        <a href="home.php"><button type="button" class="btn">Voltar</button></a> 
       <br>
    </div>
    <div class="input_fields_wrap">
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'questionario') or die(mysqli_error($mysqli));
        $result = $mysqli->query("select * from perguntas") or die($mysqli->error);
    ?>
    <div class="col">
    <div class="row" >
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Criador</th>
                <th>Data Criação</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead> 
    <?php
        while($row = $result->fetch_assoc()):           //exibindo questionários
    ?>
        <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['usuario']; ?></td>
            <td><?php echo $row['data']; ?></td>
            <td>
                <a href="collect_vals.php?answerlist=<?php echo $row['id']; ?>"
                class="btn btn-info">Minhas Respostas</a>
                <a href="collect_vals.php?answer=<?php echo $row['id']; ?>"
                class="btn btn-info" id="loc-button">Responder</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
    </div>
    </div>
    </div>
</body>
<script>
    $('#loc-button').click(function(){              //coletando a geolocalização do usuário
        if(navigator.geolocation)
        navigator.geolocation.getCurrentPosition(function(position){
            console.log(position);
        });
        else
            console.log('geolocalização não suportada');
    });
</script>
</html>