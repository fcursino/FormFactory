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
    <title>Resposta</title>
</head>
<body>
<?php require_once 'collect_vals.php' ?>
    <?php 
    if (isset($_SESSION['myquestions']) && isset($_SESSION['id'])):
        $myquestions = $_SESSION['myquestions'];
        $id = $_SESSION['id'];
        $mysqli = new mysqli('localhost', 'root', '', 'questionario') or die(mysqli_error($mysqli));
        $result = $mysqli->query("select titulo from perguntas where id=$id") or die($mysqli->error);
        $title = $result->fetch_array();
        $titleq = $title[0];                        //chamando perguntas do questionário selecionado
        $row = json_decode($myquestions[0]);
        $questions = $row->questions;
    ?>
    <div class="home-box custom-box">
        <h1>Form Factory</h1>
        <h3><?php echo $titleq; ?></h3>
        <a href="list.php"><button type="button" class="btn">Voltar</button></a> 
       <br>
    </div>
    <form action="collect_vals.php" method="POST">
    <div class="input_fields_wrap">
    <div class="col">
    <div class="row" >
    <h5>Insira seu CEP:</h5>
    <input type="text" class="input-input" name="loc" autocomplete="off" required>
    <table class="table">
    <?php
    $x = 0;
    while($x < count($questions)):
    ?>
        <tr>
            <td><?php echo  $questions[$x];         //exibindo perguntas do questionário selecionado
            $x++;
            ?><br>
        <input type="text" class="input-input" placeholder="Resposta" name="resposta[]" autocomplete="off" required>    
        </td>
        </tr>
        <?php
        endwhile;
        ?>
    </table>
    </div>
    </div>
    <input type="hidden" value="<?php echo $id; ?>" name="questid"/>
    <button type="submit" class="btn btn-info" >Enviar respostas</button>
    </form>
    </div>
    <?php endif; ?>
</body>
</html>