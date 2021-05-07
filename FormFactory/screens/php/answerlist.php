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
    <title>Minhas Respostas</title>
</head>
<body>
<?php require_once 'collect_vals.php' ?>
    <?php 
    if (isset($_SESSION['myform']) && isset($_SESSION['myanswers']) && isset($_SESSION['questid'])):
        $myform = $_SESSION['myform'];
        $myanswers = $_SESSION['myanswers'];
        $questid = $_SESSION['questid'];
        $result = $mysqli->query("select titulo from perguntas where id=$questid") or die($mysqli->error);
        $title = $result->fetch_array();
        $titleq = $title[0];
        $rowq = json_decode($myform[0]);            //chamando valores de perguntas e respostas
        $questions = $rowq->questions;
        $rowa = json_decode($myanswers[0]);
        $answers = $rowa->answers;
    ?>
    <?php endif; ?>
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
    <table class="table">
    <?php
    $x = 0;
    while($x < count($questions)):
    ?>
        <tr>
            <td><?php echo  $questions[$x];             //exibindo perguntas e respostas
            ?>
            <br>
            <?php echo $answers[$x];
            $x++;
            ?>
        </td>
        </tr>
        <?php
        endwhile;
        ?>
    </table>
    </div>
    </div>
    </form>
    </div>
</body>
</html>