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
    <title>Criando Questionário</title>
</head>
<body>
    <div class="home-box custom-box">
        <h1>Form Factory</h1>
        <h3>Criação de Questionário</h3>
       <a href="home.php"><button type="button" class="btn">Voltar</button></a> 
       <br>
    </div>
    <form action="collect_vals.php" method="POST">
           <!--Guia de uso-->
    <div class="input_fields_wrap">             
        <h5>> Digite o título e o conteúdo das questões no(s) campo(s) abaixo;<br><br>> Adicione quantas perguntas forem necessárias clicando em 'Adicionar Questão'(máx:20) e remova-as clicando em 'Remover'(mín:1);<br><br>> Quando finalizar, clique em 'Criar Meu Questionário', e este estará disponível a todos os usuários.</h5>
        <h4>Título</h4><input type="text" class="input-input" name="title" autocomplete="off" required /><br>
        <h4>Questões</h4>
        <button class="add_field_button">Adicionar Questão</button><button type="submit" class="conclusion">Criar Meu Questionário</button>
        <div><input type="text" name="mytext[]" class="input-input" autocomplete="off" required ></div>
    </div>
    </form>
</body>
<script>
    $(document).ready(function() {
	var max_fields      = 20;                       //declaração de variáveis
	var wrapper   		= $(".input_fields_wrap"); 
	var add_button      = $(".add_field_button"); 
	var x = 1;
	$(add_button).click(function(e){ 
		e.preventDefault();
		if(x < max_fields){         //função de adicionar input
			x++; 
			$(wrapper).append('<div><input type="text" name="mytext[]" class="input-input" autocomplete="off" required /><a href="#" class="remove_field">Remover</a></div>'); 
		}
	});
	$(wrapper).on("click",".remove_field", function(e){     //função de remover
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
</script>
</html>