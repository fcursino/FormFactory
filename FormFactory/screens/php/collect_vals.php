<?php

session_start();
$mysqli = new mysqli('localhost','root','','questionario'); //conectando com o banco

$titulo = '';
$data = '';					//declarando variáveis
$myJSON = '';
$name = '';

//definindo usuário da sessão
if (isset($_POST['enter'])){
	$name = $_POST['user'];
	$_SESSION['user'] = $name;
	header('location: home.php');

}

//criando questionário
if(isset($_POST["mytext"]) && is_array($_POST["mytext"])){
	$myObj->questions = $_POST["mytext"];
	$titulo = $_POST['title'];
	$name = $_SESSION['user'];
	$myJSON = json_encode($myObj);
	$data = date('d/m/Y');
	$mysqli->query("insert into perguntas (titulo, data, questoes, usuario) values('$titulo', '$data', '$myJSON', '$name')") or die($mysqli->error);
	$_SESSION['message'] = "Seu questionário foi cadastrado!";
    $_SESSION['msg_type'] = "success";							
	header('location: home.php');
}

//exibindo questionários
if (isset($_GET['answer'])){
	$id = $_GET['answer'];
	$respondente = $_SESSION['user'];
	$resultquestions = $mysqli->query("select questoes from perguntas where id=$id") or die($mysqli->error());
	$myquestions = $resultquestions->fetch_array();
	$resultanswers = $mysqli->query("select resps from respostas where questid=$id and respondente='$respondente'") or die($mysqli->error());
	$myanswers = $resultanswers->fetch_array();
	if(count($myanswers) > 0){
		$_SESSION['message'] = "Você já respondeu este questionário!";
		$_SESSION['msg_type'] = "warning";
		header('location: list.php');
	}
	else{
		$_SESSION['myquestions'] = $myquestions;
		$_SESSION['id'] = $id;
		header('location: answer.php');
	}
}

//respondendo questionário
if(isset($_POST["resposta"]) && is_array($_POST["resposta"])){
	$myObj->answers = $_POST["resposta"];
	$questid = $_POST['questid'];
	$respondente = $_SESSION['user'];
	$myJSON = json_encode($myObj);
	$data = date('d/m/Y');
	$loc = $_POST['loc'];
	$mysqli->query("insert into respostas (questid, data, resps, loc, respondente) values('$questid', '$data', '$myJSON', '$loc', '$respondente')") or die($mysqli->error);
	$_SESSION['message'] = "Sua resposta foi enviada!";
    $_SESSION['msg_type'] = "success";							
	header('location: home.php');
}

//exibindo respostas
if (isset($_GET['answerlist'])){
	$id = $_GET['answerlist'];
	$respondente = $_SESSION['user'];
	$resultanswers = $mysqli->query("select resps from respostas where questid=$id and respondente='$respondente'") or die($mysqli->error());
	$myanswers = $resultanswers->fetch_array();
	$resultform = $mysqli->query("select questoes from perguntas where id=$id") or die($mysqli->error());
	$myform = $resultform->fetch_array();
	if(count($myanswers) > 0){
		$_SESSION['myanswers'] = $myanswers;
		$_SESSION['myform'] = $myform;
		$_SESSION['questid'] = $id;
		header('location: answerlist.php');
	}
	else{
		$_SESSION['message'] = "Você não respondeu este questionário!";
		$_SESSION['msg_type'] = "danger";
		header('location: list.php');
	}
}

?>