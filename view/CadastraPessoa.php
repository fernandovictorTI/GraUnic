<?php 
    require_once ('../model/BusGraunic.php');
    require_once ('../model/Pessoa.php');

    // VERIFICA SE HOUVE POST CADASTRAR
    if(isset($_POST['cadastrar']))
    {
      Validacoes();   
    }
    // END VERIFICACAO POST CADASTRAR

    // FUNCAO QUE VALIDA OS DADOS DIGITADOS PELO USUARIO
    function Validacoes()
      {
        $isValidar = true;
        $erro = array();
        $msg = array(1 => "Erro.: Entre com o Nome da Pessoa.",
                     2 => "Erro.: Entre com o Status da Pessoa.",
                     3 => "Erro.: Entre com o RG da Pessoa.",
                     4 => "Erro.: Entre com o CPF da Pessoa.",
                     5 => "Erro.: Entre com o N�mero do Telefone.",
                     6 => "Erro.: Entre com o Curso do Aluno.",
                     7 => "Erro.: Entre com o Mat�rias da Professor.",                     
                     );

        if(is_null($_POST['nomePessoa']) || $_POST['nomePessoa'] == "")
        {
          $isValidar = false;
          array_push($erro, 1);
        }

        if($_POST['lovStatusPessoa'] <= 0)
        {
          $isValidar = false;
          array_push($erro, 2);
        }

        if(is_null($_POST['rg']) || $_POST['rg'] == "")
        {
          $isValidar = false;
          array_push($erro, 3);
        }

        if(is_null($_POST['cpf']) || $_POST['cpf'] == "")
        {
          $isValidar = false;
          array_push($erro, 4);
        }

        if(is_null($_POST['nTelefone']) || $_POST['nTelefone'] == "")
        {
          $isValidar = false;
          array_push($erro, 5);
        }
        
        if($_POST['lovStatusPessoa'] == 2)
        {
          if($_POST['curso'] <= 0)
          {
            $isValidar = false;
            array_push($erro, 6);
          }
        }

        if($_POST['lovStatusPessoa'] == 1)
        {
          $lstDis = isset($_POST['lstMat']) ? $_POST['lstMat'] : 0;
          if($lstDis <= 0)
          {
            $isValidar = false;
            array_push($erro, 7);
          }
        }

        if($isValidar == true)
        {
          Cadastrar();
        }
        else 
        {
          for($i = 0; $i < count($erro); $i++)
          {
            switch ($erro[$i]) {
              case 1:
              echo "<strong>".$msg[1]."</strong>";
                break;

              case 2:
                echo "<strong>".$msg[2]."</strong>";
                break;

              case 3:
                echo "<strong>".$msg[3]."</strong>";
                break;

              case 4:
                echo "<strong>".$msg[4]."</strong>";
                break; 

              case 5:
                echo "<strong>".$msg[5]."</strong>";
                break; 

              case 6:
                echo "<strong>".$msg[6]."</strong>";
                break; 

              case 7:
                echo "<strong>".$msg[7]."</strong>";
                break; 
            }            
          }
        }        
      }
      // END FUNCAO QUE VALIDA OS DADOS DIGITADOS PELO USUARIO

      // FUNCAO QUE CADASTRA PESSOA(ALUNO - PROFESSOR)
      function Cadastrar()
      {
        $pessoa = new Pessoa();
        $pessoa->SetNome($_POST['nomePessoa']);
        $pessoa->SetIdTipoCadastro($_POST['lovStatusPessoa']);
        $pessoa->SetRG($_POST['rg']);
        $pessoa->SetCPF($_POST['cpf']);
        $pessoa->SetNuTelefone($_POST['nTelefone']);
        $lstDis = isset($_POST['lstMat']) ? $_POST['lstMat'] : 0;
        if (count($lstDis) > 0)
        {
          for($i = 0; $i < count($lstDis);$i++)
          {
            $pessoa->SetLstDisciplinas($lstDis[$i]);
          }
        }
        $pessoa->SetCursoAluno($_POST['curso']);
        $isCadastrado = CadastrarPessoa($pessoa);
        if ($isCadastrado)
        {
          ?>
          <script type="text/javascript">
            $('#divSuccess').css({display:'block'});
          </script>
          <?php
        }
      }
      // END FUNCAO QUE CADASTRA PESSOA      
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
        <form method="post">
          <div class="form-group">
              <label>Nome Completo*</label>
              <input type="text" placeholder="Entre com seu nome" class="form-control" name="nomePessoa"/>
          </div>
          <div class="form-group">
              <label>Tipo de Cadastro*</label>
              <select name="lovStatusPessoa" id="lovStatusPessoa" class="form-control">
                  <option value="0">*** Selecione ***</option>
                  <?php $dados = ListarLov("select * from lov_statuspessoa") ; foreach ($dados as $lstDados){ ?>
                  <option value="<?php echo $lstDados["id_status"]; ?>"><?php echo $lstDados["status"]; ?></option>
                  <?php } ?>
              </select>
          </div>
          <div class="form-group">
              <label>RG*</label>
              <input type="text" class="form-control" id="rg" name="rg" placeholder="Entre com seu RG">
          </div>
          <div class="form-group">
              <label>CPF*</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Entre com seu CPF">
          </div>
          <div class="form-group">
              <label>N�mero de Telefone*</label>
              <input type="text" class="form-control" id="nTelefone" name="nTelefone" placeholder="Entre com seu Telefone">
          </div>
<!--          Se for aluno mostra isso-->
          <div id="cursoAluno" class="form-group" style="display: none">
              <label>Curso do Aluno*</label>
              <select class="form-control" name="curso">
                  <option value="0">*** Selecione ***</option>
                  <?php $curso = ListarLov("select * from tab_curso") ; foreach ($curso as $lstCursos){ ?>
                  <option value="<?php echo $lstCursos["id_curso"]; ?>"><?php echo $lstCursos["nome_curso"]; ?></option>
                  <?php } ?>
              </select>
          </div>
<!--          Se for professor mostra isso-->
          <div id="materiasProfessor" class="form-group" style="display: none">
              <label>Disciplinas a serem dadas*</label>
              <select multiple name="lstMat[]" class="form-control">
                    <?php $materias = ListarLov("select * from tab_materia") ; foreach ($materias as $lstMaterias){ ?>
                    <option value="<?php echo $lstMaterias["id_materia"]; ?>"><?php echo $lstMaterias["nome_materia"]; ?></option>
                    <?php } ?>
              </select>
          </div>
      <button type="reset" class="btn btn-default">Limpar</button>
      <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
      </form>
      </div>
  </div>
  <div id="divSuccess" class="alert alert-success" style="display:none">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Cadastrado com successo.:</strong>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>  
</html>