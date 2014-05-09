<?php
	require_once ('../model/BusGraunic.php');

	$idPessoa = base64_decode($_GET['id']);
	$dadosPessoa = RetornaDadosPessoa($idPessoa);
	$pessoa = new Pessoa();

	foreach ($dadosPessoa as  $value) {
		$pessoa->SetNome($value['nome_pessoa']);
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8" />
	<meta charset=utf-8 />
    <title>Sistema de Grades UNIC</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view tde page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="padding: 5px">
<div class="panel panel-primary">
  <div class="panel-heading">Painel do sistema</div>
  <div class="panel-body">
  	<h4>Bem Vindo <small><?php echo $pessoa->GetNome(); ?></small></h4>
  	<hr />
  	<h5>Grade do Aluno</h5>
  	<table class="table table-striped">
  		<tr>
  			<td>Horário</td>
  			<td>Segunda-Feira</td>
  			<td>Terça-Feira</td>
  			<td>Quarta-Feira</td>
  			<td>Quinta-Feira</td>
  			<td>Sexta-Feria</td>
  		</tr>
  		<tr>
  			<td>19:00 as 20:15</td>
  			<td>Segunda-Feira</td>
  			<td>Terça-Feira</td>
  			<td>Quarta-Feira</td>
  			<td>Quinta-Feira</td>
  			<td>Sexta-Feria</td>
  		</tr>
  		<tr>
  			<td>20:45 as 22:00</td>
  			<td>Segunda-Feira</td>
  			<td>Terça-Feira</td>
  			<td>Quarta-Feira</td>
  			<td>Quinta-Feira</td>
  			<td>Sexta-Feria</td>
  		</tr>
	</table>
  </div>
  </div>   
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>