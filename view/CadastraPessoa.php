<?php 
    require_once ('../model/BusGraunic.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8" />
    <title>Sistema de Grades UNIC</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body style="padding: 5px">
      <script type="text/javascript">
          $(document).ready(function(){
            $('#lovStatusPessoa').change(function(){
                switch($('#lovStatusPessoa').val())
                {
                    case("2"):
                        $('#cursoAluno').css({display:'block'});
                        $('#materiasProfessor').css({display:'none'});
                        break;
                    case("1"):
                        $('#materiasProfessor').css({display:'block'});
                        $('#cursoAluno').css({display:'none'});
                        break;
                    default :
                        $('#cursoAluno').css({display:'none'});
                        $('#materiasProfessor').css({display:'none'});
                        break;
                }
            });
          })
      </script>
      <div class="panel panel-primary" style="padding: 10px">
        <div class="panel-heading">Cadastrar Pessoa</div>
        <br />
      <form role="form">
          <div class="form-group">
              <label>Nome Completo*</label>
              <input type="text" class="form-control" id="nomePessoa" placeholder="Entre com seu nome completo">
          </div>
          <div class="form-group">
              <label>Tipo de Cadastro*</label>
              <select id="lovStatusPessoa" class="form-control">
                  <option value="0">*** Selecione ***</option>
                  <?php $dados = ListarLov("select * from lov_statuspessoa") ; foreach ($dados as $lstDados){ ?>
                  <option value="<?php echo $lstDados["id_status"]; ?>"><?php echo $lstDados["status"]; ?></option>
                  <?php } ?>
              </select>
          </div>
          <div class="form-group">
              <label>RG*</label>
              <input type="text" class="form-control" id="rg" placeholder="Entre com seu RG">
          </div>
          <div class="form-group">
              <label>CPF*</label>
              <input type="text" class="form-control" id="cpf" placeholder="Entre com seu CPF">
          </div>
          <div class="form-group">
              <label>Número de Telefone*</label>
              <input type="text" class="form-control" id="nTelefone" placeholder="Entre com seu Telefone">
          </div>
<!--          Se for aluno mostra isso-->
          <div id="cursoAluno" class="form-group" style="display: none">
              <label>Curso do Aluno*</label>
              <select class="form-control">
                  <option value="0">*** Selecione ***</option>
                  <?php $curso = ListarLov("select * from tab_curso") ; foreach ($curso as $lstCursos){ ?>
                  <option value="<?php echo $lstCursos["id_curso"]; ?>"><?php echo $lstCursos["nome_curso"]; ?></option>
                  <?php } ?>
              </select>
          </div>
<!--          Se for professor mostra isso-->
          <div id="materiasProfessor" class="form-group" style="display: none">
              <label>Disciplinas a serem dadas*</label>
              <select multiple class="form-control" style="height: 100%">
                    <?php $materias = ListarLov("select * from tab_materia") ; foreach ($materias as $lstMaterias){ ?>
                    <option value="<?php echo $lstMaterias["id_materia"]; ?>"><?php echo $lstMaterias["nome_materia"]; ?></option>
                    <?php } ?>
                </select>
          </div>
      <button type="submit" class="btn btn-default">Voltar</button>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>  
      </div>
  </div>
  </body>
</html>