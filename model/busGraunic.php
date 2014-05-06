<?php
	require_once ('../controller/FuncoesBanco.php');
      
            function ListarLov($sQL)
            {                   
              return ListarDadosArray($sQL);
            }

            function CadastrarAluno()
            {
              CadastrarPessoa();
            }

            function BsContemDados($sQL)
            {
              $valor = ListarDadosArray($sQL);
              foreach ($valor as $value) 
              {
                return $value["count(id_pessoa)"];
              }
            }
?>
