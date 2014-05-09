<?php 
    require_once ('../model/BusGraunic.php');

    // VERIFICA SE HOUVE POST CADASTRAR
    if(isset($_POST['logar']))
    {
      $emailPessoa = $_POST['email'];
      $senhaPessoa = $_POST['password'];
      $idPessoa = VerificaLogin($emailPessoa, $senhaPessoa);
      if($idPessoa > 0)
      {
        $idCript = base64_encode($idPessoa);
        header("Location: Portal.php?id=$idCript");
      }   
    }
    // END VERIFICACAO POST CADASTRAR
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8" />
    <title>Sistema de Grades UNIC</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="padding: 5px">
<div class="panel panel-primary">
  <div class="panel-heading">Acesso ao sistema</div>
  <div class="panel-body">
    <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Entre com seu e-mail.:</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Senha.:</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-default" name="logar">Entrar</button>
    </form>
    </div>
</div>  
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>