<?php 
    require_once ('../model/BusGraunic.php');
    require_once ('../model/Pessoa.php');
?>
    
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Sistema de Grades UNIC</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">  
  </head>
  <body style="padding: 5px">      
      <div class="panel panel-primary" style="padding: 10px">
        <div class="panel-heading">Cadastrar Pessoa</div>
        <br />
          <div id="divSuccess" class="alert alert-success" style="display:none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong><?php echo $_POST['nomePessoa'] ?>.: Cadastrado com sucesso</strong>
          </div>
        <form method="post">
          <div class="form-group">
              <label>Nome Completo <span style="color:red">*</span></label>
              <input type="text" placeholder="Entre com seu nome" class="form-control" name="nomePessoa" value="<?php echo ($_POST && isset($_POST['nomePessoa'])) ? $_POST['nomePessoa'] : ''; ?>"/>
          </div>
          <div class="form-group"> 
              <label>Tipo de Cadastro<span style="color:red"> *</span></label>
              <select name="lovStatusPessoa" id="lovStatusPessoa" class="form-control">
                  <option value="0">*** Selecione ***</option>
                  <?php $dados = ListarLov("select * from lov_statuspessoa") ; foreach ($dados as $lstDados){ ?>
                  <option value="<?php echo $lstDados["id_status"]; ?>"><?php echo $lstDados["status"]; ?></option>
                  <?php } ?>
              </select>
          </div>
          <div class="form-group">
              <label>E-mail<span style="color:red"> *</span></label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Entre com seu E-mail" value="<?php echo ($_POST && isset($_POST['email'])) ? $_POST['email'] : ''; ?>" />
          </div>
          <div class="form-group">
              <label>RG<span style="color:red"> *</span></label>
              <input type="text" class="form-control" id="rg" name="rg" placeholder="Entre com seu RG" value="<?php echo ($_POST && isset($_POST['rg'])) ? $_POST['rg'] : ''; ?>" />
          </div>
          <div class="form-group">
              <label>CPF<span style="color:red"> *</span></label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Entre com seu CPF" value="<?php echo ($_POST && isset($_POST['cpf'])) ? $_POST['cpf'] : ''; ?>" />
          </div>
          <div class="form-group">
              <label>Número de Telefone<span style="color:red"> *</span></label>
              <input type="text" class="form-control" id="nTelefone" name="nTelefone" placeholder="Entre com seu Telefone" value="<?php echo ($_POST && isset($_POST['nTelefone'])) ? $_POST['nTelefone'] : ''; ?>">
          </div>
<!--          Se for aluno mostra isso-->
          <div id="cursoAluno" class="form-group" style="display: none">
              <label>Curso do Aluno<span style="color:red" >*</span></label>
              <select class="form-control" name="curso">
                  <option value="0">*** Selecione ***</option>
                  <?php $curso = ListarLov("select * from tab_curso") ; foreach ($curso as $lstCursos){ ?>
                  <option value="<?php echo $lstCursos["id_curso"]; ?>"><?php echo $lstCursos["nome_curso"]; ?></option>
                  <?php } ?>
              </select>
          </div>
<!--          Se for professor mostra isso-->
<div id="materiasProfessor" class="panel panel-default" style="display: none">
  <div class="panel-body">
          <div  class="form-group" >
              <label>Disciplinas a serem dadas<span style="color:red"> *</span></label>
              <select multiple name="lstMat[]" class="form-control">
                    <?php $materias = ListarLov("select tm.id_materia, tm.nome_materia from tab_materia tm 
                                                 left outer join tab_professor tp on tp.cod_materia = tm.id_materia
                                                 where tp.cod_materia is null order by tm.id_materia") ; 
                    foreach ($materias as $lstMaterias){ ?>
                      <option value="<?php echo $lstMaterias["id_materia"]; ?>"><?php echo $lstMaterias["nome_materia"]; ?></option>
                    <?php } ?>
              </select>
              <hr />
              <p>Escolha um dia e Horário para dar aula: <a href="#" id="element" data-toggle="tooltip" data-placement="left" title="Os critérios para organização do horário depende do tempo de cadastro do professor na instituição." ><span class="glyphicon glyphicon-comment"></span></a></p>
              <div class="col-sm-12">
                <div class="col-sm-6">
                  <select name="priDia" class="form-control">
                        <option value="0">Selecione o dia</option>
                        <option value="1">Segunda-Feira</option>
                        <option value="2">Terça-Feira</option>
                        <option value="3">Quarta-Feira</option>
                        <option value="4">Quinta-Feira</option>
                        <option value="5">Sexta-Feira</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <select name="priHor" class="form-control">
                        <option value="0">Selecione o Horário</option>
                        <option value="1">1º Horário</option>
                        <option value="2">2º Horário</option>
                  </select>
                </div>
              </div>
              <br />
              <br />
              <div class="col-sm-12">
                <div class="col-sm-6">
                  <select name="segDia" class="form-control">
                        <option value="0">Selecione o dia</option>
                        <option value="1">Segunda-Feira</option>
                        <option value="2">Terça-Feira</option>
                        <option value="3">Quarta-Feira</option>
                        <option value="4">Quinta-Feira</option>
                        <option value="5">Sexta-Feira</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <select name="segHor" class="form-control">
                        <option value="0">Selecione o Horário</option>
                        <option value="1">1º Horário</option>
                        <option value="2">2º Horário</option>
                  </select>
                </div>
              </div>
          </div>
        </div>
      </div>
      <a href="principal.php" class="btn btn-danger">Cancelar</a>
      <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
      </form>
      </div>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Js/jquery.maskedinput.min.js"></script>
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

            $(function(){
                $('#rg').mask("999999-99");
                $('#cpf').mask("999.999.999-99");
                $('#nTelefone').mask("(99) 9999-9999");
            });

            $('#element').tooltip('show');

          })
      </script>
  </body>  
</html>


<?php
    // VERIFICA SE HOUVE POST CADASTRAR
    if(isset($_POST['cadastrar']))
    {
      Validacoes();   
    }
    // END VERIFICACAO POST CADASTRAR

    //  VERIFICA SE HOUVE POST EDITAR
    if(isset($_GET['editar']))
    {
      $idPessoa = $_GET['editar'];
      echo $idPessoa;
    }
    // END VERIFICACAO POST EDITAR

    // FUNCAO QUE VALIDA OS DADOS DIGITADOS PELO USUARIO
    function Validacoes()
      {
        $isValidar = true;
        $erro = array();
        $msg = array(1 => "Entre com o Nome da Pessoa.",
                     2 => "Entre com o Status da Pessoa.",
                     3 => "Entre com o RG da Pessoa.",
                     4 => "Entre com o CPF da Pessoa.",
                     5 => "Entre com o Número do Telefone.",
                     6 => "Entre com o Curso do Aluno.",
                     7 => "Entre com o Matérias do Professor.",
                     8 => "Entre com o E-mail da Pessoa.",
                     9 => "E-mail cadastrado em nosso banco de dados.",
                     10 => "Escolha os horários para serem ministradas as aulas corretamente.",
                     11 => "Selecione no maximo duas matérias"
                     );
        $mensagem = "";

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
        
        if(is_null($_POST['email']) || $_POST['email'] == "")
        {
            $isValidar = false;
            array_push($erro, 8);
        }

        $emailPessoa = $_POST['email'];
        if(BsContemDados("select count(id_pessoa) from tab_pessoa where email_pessoa = rtrim(ltrim('$emailPessoa'))") > 0)
        {
            $isValidar = false;
            array_push($erro, 9);
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
          if (count($lstDis) > 2) 
          {
            $isValidar = false;
            array_push($erro, 11); 
          }
        }

        if($_POST['lovStatusPessoa'] == 1)
        {
          if($_POST['priDia'] <= 0 || $_POST['segDia'] <= 0 || $_POST['priHor'] <= 0 || $_POST['segHor'] <= 0)
          {
            $isValidar = false;
            array_push($erro, 10);
          }
        }

        if($isValidar == true)
        {
          Cadastrar();
        }
        else 
        {
          ?>
          <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h4>Erro no cadastro</h4>
                      <hr />
                      <ul>
                      <?php                      
                        foreach ($erro as $err) 
                        {
                          foreach ($msg as $key => $ms) {
                            if($err == $key)
                            {                              
                              echo "<li>".$ms."</li>";                              
                            }
                          }
                        }
                      ?>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <script type="text/javascript">
              $('#myModal').modal('show');
            </script>
          <?php          
        }        
      }
      // END FUNCAO QUE VALIDA OS DADOS DIGITADOS PELO USUARIO

      // FUNCAO QUE CADASTRA PESSOA(ALUNO - PROFESSOR)
      function Cadastrar()
      {
        $pessoa = new Pessoa();
        $pessoa->SetNome($_POST['nomePessoa']);
        $pessoa->SetIdTipoCadastro($_POST['lovStatusPessoa']);
        $pessoa->SetEmail($_POST['email']);
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
        $pessoa->SetCodPriAula(IdDiaHorAulaProfessor($_POST['priDia'], $_POST['priHor']));
        $pessoa->SetCodSegAula(IdDiaHorAulaProfessor($_POST['segDia'], $_POST['segHor']));
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

      /*
      *FUNCAO QUE RETORNA O ID DO DIA/HORARIO QUE O PROFESSOR ESCOLHEU PRA DAR AULA
      * 1 SEGUNDA 1°
      * 2 TERCA 1°
      * 3 QUARTA 1°
      * 4 QUINTA 1°
      * 5 SEXTA 1°
      * 6 SEGUNDA 2°
      * 7 TERCA 2°
      * 8 QUARTA 2°
      * 9 QUINTA 2°
      * 10 SEXTA 2°
      */
      function IdDiaHorAulaProfessor($dia, $hor)
      {
        switch ($hor) {
          case 1:
            return $dia;
            break;
          
          default:
            switch ($dia) {
              case 1:
                return 6;
                break;

              case 2:
                return 7;
                break;
              case 3:
                return 8;
                break;
              case 4:
                return 9;
                break;
              case 5:
                return 10;
                break;        
            }
            break;
        }
        // END FUNCAO QUE RETORNA O ID DO DIA/HORARIO QUE O PROFESSOR ESCOLHEU PRA DAR AULA
      }      
?>